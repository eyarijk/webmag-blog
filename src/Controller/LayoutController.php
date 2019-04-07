<?php

namespace App\Controller;

use App\Form\SearchType;
use App\Form\SubscriberType;
use App\Repository\CategoryRepository;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class LayoutController extends AbstractController
{
    /**
     * @param CategoryRepository $categoryRepository
     * @return Response
     */
    public function widgetCategories(CategoryRepository $categoryRepository): Response
    {
        return $this->render('includes/_aside_widget_categories.html.twig', [
            'enabledCategoriesWithCountArticles' => $categoryRepository->getEnabledWithCountArticles(),
        ]);
    }

    /**
     * @param TagRepository $tagRepository
     * @return Response
     */
    public function widgetTags(TagRepository $tagRepository): Response
    {
        return $this->render('includes/_aside_widget_tags.html.twig', [
            'tags' => $tagRepository->getEnabled(),
        ]);
    }

    /**
     * @param CategoryRepository $categoryRepository
     * @return Response
     */
    public function navMenu(CategoryRepository $categoryRepository): Response
    {
        return $this->render('includes/_nav_menu.html.twig', [
            'categories' => $categoryRepository->getForMenu(),
            'searchForm' => $this->createForm(SearchType::class)->createView(),
        ]);
    }

    /**
     * @param CategoryRepository $categoryRepository
     * @return Response
     */
    public function footerBlock(CategoryRepository $categoryRepository): Response
    {
        return $this->render('includes/_footer.html.twig', [
            'categories' => $categoryRepository->getForMenu(),
            'subscriberForm' => $this->createForm(SubscriberType::class)->createView(),
        ]);
    }
}
