<?php

namespace App\Controller\Article;

use App\Entity\Article;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PopularController extends AbstractController
{
    /**
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function index(PaginatorInterface $paginator): Response
    {
        $articleRepository = $this
            ->getDoctrine()
            ->getRepository(Article::class)
        ;

        $mainArticles = $articleRepository->getMain();
        $popularArticlesQuery = $articleRepository->getPopularQuery();

        $popularArticles = $paginator->paginate(
            $popularArticlesQuery,
            1,
            4
        );

        return $this->render('popular/index.html.twig', [
            'mainArticles' => $mainArticles,
            'articles' => $popularArticles,
        ]);
    }

    /**
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return JsonResponse
     */
    public function getMoreRead(Request $request, PaginatorInterface $paginator): JsonResponse
    {
        $moreReadArticlesQuery = $this
            ->getDoctrine()
            ->getRepository(Article::class)
            ->getPopularQuery()
        ;

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
