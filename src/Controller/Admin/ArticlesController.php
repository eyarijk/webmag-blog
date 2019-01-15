<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Form\ArticleType;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @IsGranted("ROLE_USER")
 */
class ArticlesController extends AbstractController
{
    /**
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $articlesRepository = $this
            ->getDoctrine()
            ->getRepository(Article::class)
        ;

        $articles = $this->isGranted('ROLE_SUPER_ADMIN')
            ? $articlesRepository->getSortByIdDescQuery()
            : $articlesRepository->getSortByIdDescByUserQuery($this->getUser())
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
            $this->saveArticle($form);

            return $this->redirectToRoute('articles_index');
        }

        return $this->render('admin/articles/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @IsGranted("edit", subject="article")
     * @param Article $article
     * @param Request $request
     * @return Response
     */
    public function edit(Article $article, Request $request): Response
    {
        $form = $this->createForm(ArticleType::class, $article, [
            'labelForSubmit' => 'Update',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->saveArticle($form);

            return $this->redirectToRoute('articles_index');
        }

        return $this->render('admin/articles/edit.html.twig', [
            'form' => $form->createView(),
            'article' => $article,
        ]);
    }

    /**
     * @IsGranted("edit", subject="article")
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

    /**
     * @param FormInterface $form
     * @return Article
     */
    private function saveArticle(FormInterface $form): Article
    {
        $article = $form->getData();

        $mainImageFile = $form
            ->get('mainImageFile')
            ->getData()
        ;

        $headerImageFile = $form
            ->get('headerImageFile')
            ->getData()
        ;

        if ($mainImageFile instanceof UploadedFile) {
            $mainImageFileName = $this->uploadFile($mainImageFile);

            $article->setMainImage($mainImageFileName);
        }

        if ($headerImageFile instanceof UploadedFile) {
            $headerImageFileName = $this->uploadFile($headerImageFile);

            $article->setHeaderImage($headerImageFileName);
        }

        $article->setUser($this->getUser());

        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();

        return $article;
    }

    /**
     * :TODO Потрібно буде створити сервіс, який буде зберігати файли .
     * @param UploadedFile $uploadedFile
     * @return string|null
     */
    private function uploadFile(UploadedFile $uploadedFile): ?string
    {
        $imagesDirectory = $this->getParameter('images_directory');

        $fileName = md5(uniqid('images', true)) . '.' . $uploadedFile->guessExtension();

        $uploadedFile->move(
            $imagesDirectory,
            $fileName
        );

        return $fileName;
    }
}
