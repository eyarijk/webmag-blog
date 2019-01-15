<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Tag;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class LayoutController extends AbstractController
{
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
    public function footerCategories(): Response
    {
        $categories = $this
            ->getDoctrine()
            ->getRepository(Category::class)
            ->getForMenu()
        ;

        return $this->render('includes/_footer_categories.html.twig', [
            'categories' => $categories,
        ]);
    }
}