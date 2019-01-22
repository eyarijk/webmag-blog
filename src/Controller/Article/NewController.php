<?php

namespace App\Controller\Article;

use App\Entity\Article;
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
     * @return Response
     */
    public function index(PaginatorInterface $paginator,Breadcrumbs $breadcrumbs): Response
    {
        $articleRepository = $this
            ->getDoctrine()
            ->getRepository(Article::class)
        ;

        $mainArticles = $articleRepository->getMain(3);
        $newArticlesQuery = $articleRepository->getNewQuery();

        $newArticles = $paginator->paginate(
            $newArticlesQuery,
            1,
            4
        );

        $breadcrumbs
            ->addRouteItem('Home','home')
            ->addItem('News')
        ;

        return $this->render('new/index.html.twig', [
            'mainArticles' => $mainArticles,
            'articles' => $newArticles,
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
            ->getNewQuery()
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