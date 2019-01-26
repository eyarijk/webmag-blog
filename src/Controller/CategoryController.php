<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Translation\TranslatorInterface;
use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;

class CategoryController extends AbstractController
{
    /**
     * @param Category $category
     * @param PaginatorInterface $paginator
     * @param Breadcrumbs $breadcrumbs
     * @param TranslatorInterface $translator
     * @return Response
     */
    public function index(Category $category, PaginatorInterface $paginator, Breadcrumbs $breadcrumbs, TranslatorInterface $translator): Response
    {
        $articleRepository = $this
            ->getDoctrine()
            ->getRepository(Article::class)
        ;

        $mainArticles = $articleRepository->getMainByCategory($category, 3);

        $articles = $paginator->paginate(
            $articleRepository->getByCategoryQuery($category),
            1,
            4
        );

        $breadcrumbs
            ->addRouteItem('breadcrumbs.home', 'home')
            ->addItem($category->getTitle())
        ;

        return $this->render('category/index.html.twig', [
            'category' => $category,
            'mainArticles' => $mainArticles,
            'articles' => $articles,
        ]);
    }

    /**
     * @param Category $category
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return JsonResponse
     */
    public function getMoreRead(Category $category, PaginatorInterface $paginator, Request $request): JsonResponse
    {
        $articlesQuery = $this
            ->getDoctrine()
            ->getRepository(Article::class)
            ->getByCategoryQuery($category)
        ;

        $articles = $paginator->paginate(
            $articlesQuery,
            $request->query->getInt('page', 1),
            4
        );

        $paginationData = $articles->getPaginationData();

        $count = $paginationData['totalCount'] - $paginationData['lastItemNumber'];

        return new JsonResponse([
            'view' => $this->renderView('articles/common/_more_read_block.html.twig', [
                'articles' => $articles,
            ]),
            'count' => $count,
            'hideButton' => $count < 1,
        ]);
    }
}
