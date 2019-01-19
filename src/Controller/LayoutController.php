<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Subscriber;
use App\Entity\Tag;
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
        $email = $request->get('email');

        $subscriber = $this
            ->getDoctrine()
            ->getRepository(Subscriber::class)
            ->findByEmail($email)
        ;

        if ($subscriber !== null) {
            return new JsonResponse([
                'status' => 'error',
                'message' => 'This email is already signed!',
            ]);
        }

        $token = md5($email . '-' . time());

        $subscriber = new Subscriber();
        $subscriber->setEmail($email);
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

        return $this->render('includes/_footer.html.twig', [
            'categories' => $categories,
        ]);
    }
}
