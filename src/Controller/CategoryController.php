<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryController extends AbstractController
{
    /**
     * @param string $categorySlug
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function index(string $categorySlug, PaginatorInterface $paginator): Response
    {
        $category = $this
            ->getDoctrine()
            ->getRepository(Category::class)
            ->findEnableBySlug($categorySlug)
        ;

        if ($category === null) {
            throw new NotFoundHttpException('Category (slug: ' . $categorySlug . ' ) not found!');
        }

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

        return $this->render('category/index.html.twig', [
            'category' => $category,
            'mainArticles' => $mainArticles,
            'articles' => $articles,
        ]);
    }

    /**
     * @param string $categorySlug
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return JsonResponse
     */
    public function getMoreRead(string $categorySlug, PaginatorInterface $paginator, Request $request): JsonResponse
    {
        $category = $this
            ->getDoctrine()
            ->getRepository(Category::class)
            ->findEnableBySlug($categorySlug)
        ;

        if ($category === null) {
            throw new NotFoundHttpException('Category (slug: ' . $categorySlug . ' ) not found!');
        }

        $articles = $this
            ->getDoctrine()
            ->getRepository(Article::class)
            ->getByCategoryQuery($category)
        ;

        $articles = $paginator->paginate(
            $articles,
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
