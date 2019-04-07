<?php

namespace App\Controller\Article;

use App\Repository\ArticleRepository;
use Knp\Component\Pager\Pagination\SlidingPagination;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;

class NewController extends AbstractController
{
    /**
     * @param PaginatorInterface $paginator
     * @param Breadcrumbs $breadcrumbs
     * @param ArticleRepository $articleRepository
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Breadcrumbs $breadcrumbs, ArticleRepository $articleRepository): Response
    {
        $mainArticles = $articleRepository->getMain(3);
        $newArticlesQuery = $articleRepository->getNewQuery();

        $newArticles = $paginator->paginate(
            $newArticlesQuery,
            1,
            4
        );

        $breadcrumbs
            ->addRouteItem('breadcrumbs.home', 'home')
            ->addItem('breadcrumbs.news')
        ;

        return $this->render('new/index.html.twig', [
            'mainArticles' => $mainArticles,
            'articles' => $newArticles,
        ]);
    }

    /**
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @param ArticleRepository $articleRepository
     * @return JsonResponse
     */
    public function getMoreRead(Request $request, PaginatorInterface $paginator, ArticleRepository $articleRepository): JsonResponse
    {
        $moreReadArticlesQuery = $articleRepository->getNewQuery();

        /**
         * @var SlidingPagination $articles
         */
        $articles = $paginator->paginate(
            $moreReadArticlesQuery,
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
