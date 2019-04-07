<?php

namespace App\Controller;

use App\Entity\Tag;
use App\Repository\ArticleRepository;
use Knp\Component\Pager\Pagination\SlidingPagination;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;

class TagsController extends AbstractController
{
    /**
     * @param Tag $tag
     * @param PaginatorInterface $paginator
     * @param Breadcrumbs $breadcrumbs
     * @param ArticleRepository $articleRepository
     * @return Response
     */
    public function index(Tag $tag, PaginatorInterface $paginator, Breadcrumbs $breadcrumbs, ArticleRepository $articleRepository): Response
    {
        $mainArticles = $articleRepository->getMainByTag($tag, 3);

        $articles = $paginator->paginate(
            $articleRepository->getByTagQuery($tag),
            1,
            4
        );

        $breadcrumbs
            ->addRouteItem('breadcrumbs.home', 'home')
            ->addItem($tag->getTitle())
        ;

        return $this->render('tags/index.html.twig', [
            'tag' => $tag,
            'mainArticles' => $mainArticles,
            'articles' => $articles,
        ]);
    }

    /**
     * @param Tag $tag
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @param ArticleRepository $articleRepository
     * @return JsonResponse
     */
    public function getMoreRead(Tag $tag, PaginatorInterface $paginator, Request $request, ArticleRepository $articleRepository): JsonResponse
    {
        $articlesQuery = $articleRepository->getByTagQuery($tag);

        /**
         * @var SlidingPagination $articles
         */
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
