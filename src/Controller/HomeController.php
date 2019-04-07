<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Knp\Component\Pager\Pagination\SlidingPagination;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @param PaginatorInterface $paginator
     * @param ArticleRepository $articleRepository
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @return Response
     */
    public function index(PaginatorInterface $paginator, ArticleRepository $articleRepository): Response
    {
        $recentArticles = $articleRepository->getRecent();
        $featuredArticles = $articleRepository->getFeatured();
        $mostReadArticlesQuery = $articleRepository->getMostReadQuery();
        $countEnabledArticles = $articleRepository->getEnabledCount();
        $mainArticles = $articleRepository->getMain();

        $mostReadArticles = $paginator->paginate(
            $mostReadArticlesQuery,
            1,
            4
        );

        return $this->render('home.html.twig', [
            'recentArticles' => $recentArticles,
            'featuredArticles' => $featuredArticles,
            'mostReadArticles' => $mostReadArticles,
            'countEnabledArticles' => $countEnabledArticles,
            'mainArticles' => $mainArticles,
        ]);
    }

    /**
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @param ArticleRepository $articleRepository
     * @return JsonResponse
     */
    public function getMostRead(Request $request, PaginatorInterface $paginator, ArticleRepository $articleRepository): JsonResponse
    {
        $mostReadArticlesQuery = $articleRepository->getMostReadQuery();

        /**
         * @var SlidingPagination $articles
         */
        $articles = $paginator->paginate(
            $mostReadArticlesQuery,
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
