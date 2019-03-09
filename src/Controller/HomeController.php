<?php

namespace App\Controller;

use App\Entity\Article;
use App\Mr\NewsApiBundle\NewsClient;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @param PaginatorInterface $paginator
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @return Response
     */
    public function index(PaginatorInterface $paginator,NewsClient $client): Response
    {
        dd($client);
        $articleRepository = $this
            ->getDoctrine()
            ->getRepository(Article::class)
        ;

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
     * @return JsonResponse
     */
    public function getMostRead(Request $request, PaginatorInterface $paginator): JsonResponse
    {
        $mostReadArticlesQuery = $this
            ->getDoctrine()
            ->getRepository(Article::class)
            ->getMostReadQuery()
        ;

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
