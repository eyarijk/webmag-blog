<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Subscriber;
use App\Entity\Tag;
use App\Form\SubscriberType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LayoutController extends AbstractController
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function subscribeUser(Request $request): JsonResponse
    {
        $subscriberForm = $this->createForm(SubscriberType::class,new Subscriber());
        $subscriberForm->handleRequest($request);

        if ($subscriberForm->isValid() && $subscriberForm->isSubmitted()) {
            /**
             * @var Subscriber $subscriber
             */
            $subscriber = $subscriberForm->getData();

            $token = md5(uniqid('subscriber', true));

            $subscriber->setToken($token);

            $em = $this
                ->getDoctrine()
                ->getManager()
            ;

            $em->persist($subscriber);
            $em->flush();

            return new JsonResponse([
                'status' => 'success',
                'message' => 'You have successfully subscribed!',
            ]);
        }

        return new JsonResponse([
            'status' => 'error',
            'message' => 'Form is not valid!',
        ]);
    }

    /**
     * @return Response
     */
    public function widgetCategories(): Response
    {
        $enabledCategoriesWithCountArticles = $this
            ->getDoctrine()
            ->getRepository(Category::class)
            ->getEnabledWithCountArticles()
        ;

        return $this->render('includes/_aside_widget_categories.html.twig', [
            'enabledCategoriesWithCountArticles' => $enabledCategoriesWithCountArticles,
        ]);
    }

    /**
     * @return Response
     */
    public function widgetTags(): Response
    {
        $tags = $this
            ->getDoctrine()
            ->getRepository(Tag::class)
            ->getEnabled()
        ;

        return $this->render('includes/_aside_widget_tags.html.twig', [
            'tags' => $tags,
        ]);
    }

    /**
     * @return Response
     */
    public function navMenu(): Response
    {
        $categories = $this
            ->getDoctrine()
            ->getRepository(Category::class)
            ->getForMenu()
        ;

        return $this->render('includes/_nav_menu.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * @return Response
     */
    public function footerBlock(): Response
    {
        $categories = $this
            ->getDoctrine()
            ->getRepository(Category::class)
            ->getForMenu()
        ;

        $subscriberForm = $this->createForm(SubscriberType::class);

        return $this->render('includes/_footer.html.twig', [
            'categories' => $categories,
            'subscriberForm' => $subscriberForm->createView(),
        ]);
    }
}
