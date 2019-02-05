<?php

namespace App\Controller;

use App\Entity\Subscriber;
use App\Form\SubscriberType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Translation\TranslatorInterface;

class SubscriberController extends AbstractController
{
    /**
     * @param Request $request
     * @param TranslatorInterface $translator
     * @return JsonResponse
     */
    public function subscribe(Request $request, TranslatorInterface $translator): JsonResponse
    {
        $subscriberForm = $this->createForm(SubscriberType::class);
        $subscriberForm->handleRequest($request);

        if ($subscriberForm->isValid() && $subscriberForm->isSubmitted()) {
            /**
             * @var Subscriber
             */
            $subscriber = $subscriberForm->getData();

            $token = md5(uniqid('subscriber', true));

            $subscriber->setToken($token);
            $subscriber->setLocale($request->getLocale());

            $em = $this
                ->getDoctrine()
                ->getManager()
            ;

            $em->persist($subscriber);
            $em->flush();

            return new JsonResponse([
                'status' => 'success',
                'message' => $translator->trans('subscriber.success'),
            ]);
        }

        return new JsonResponse([
            'status' => 'error',
            'message' => $translator->trans('subscriber.error'),
        ]);
    }

    /**
     * @param Subscriber $subscriber
     * @return Response
     * @ParamConverter("subscriber", options={"mapping" : {"token" : "token"}})
     */
    public function unsubscribe(Subscriber $subscriber): Response
    {
        $subscriber->setIsActive(false);

        $this
            ->getDoctrine()
            ->getManager()
            ->flush()
        ;

        return $this->render('subscriber/unsubscribe.html.twig');
    }
}
