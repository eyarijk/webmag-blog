<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Form\ArticleType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticlesController extends AbstractController
{
    /**
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $articles = $this
            ->getDoctrine()
            ->getRepository(Article::class)
            ->getSortByIdDescQuery()
        ;

        $articles = $paginator->paginate(
            $articles,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('admin/articles/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @param Request $request
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @return Response
     */
    public function create(Request $request): Response
    {
        $article = new Article();

        $form = $this->createForm(ArticleType::class, $article, [
            'labelForSubmit' => 'Create',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $articlesImagesDir = $this->getParameter('articles_images_directory');

            $this
                ->getDoctrine()
                ->getRepository(Article::class)
                ->save($form->getData(), $this->getUser(), $articlesImagesDir)
            ;

            return $this->redirectToRoute('articles_index');
        }

        return $this->render('admin/articles/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Article $article
     * @param Request $request
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @return Response
     */
    public function edit(Article $article, Request $request): Response
    {
        $form = $this->createForm(ArticleType::class, $article, [
            'labelForSubmit' => 'Update',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $articlesImagesDir = $this->getParameter('articles_images_directory');

            $this
                ->getDoctrine()
                ->getRepository(Article::class)
                ->save($form->getData(), $this->getUser(), $articlesImagesDir)
            ;

            return $this->redirectToRoute('articles_index');
        }

        return $this->render('admin/articles/edit.html.twig', [
            'form' => $form->createView(),
            'article' => $article,
        ]);
    }

    /**
     * @param Article $article
     * @return Response
     */
    public function delete(Article $article): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($article);
        $entityManager->flush();

        return $this->redirectToRoute('articles_index');
    }
}
