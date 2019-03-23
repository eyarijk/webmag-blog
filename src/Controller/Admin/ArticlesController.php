<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\ArticleImage;
use App\Form\ArticleType;
use App\Service\ImageUpload;
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
     * @var ImageUpload
     */
    private $imageUpload;

    /**
     * ArticlesController constructor.
     * @param ImageUpload $imageUpload
     */
    public function __construct(ImageUpload $imageUpload)
    {
        $this->imageUpload = $imageUpload;
    }

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
            $this->persistUpdateArticle($form);

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
            $this->persistUpdateArticle($form);

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
    private function persistUpdateArticle(FormInterface $form): Article
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
            $mainImageFileName = $this->imageUpload->upload($mainImageFile);

            $articleImageMain = new ArticleImage();
            $articleImageMain->setName($mainImageFileName);

            $article->setMainImage($articleImageMain);
        }

        if ($headerImageFile instanceof UploadedFile) {
            $headerImageFileName = $this->imageUpload->upload($headerImageFile);

            $articleImageHeader = new ArticleImage();
            $articleImageHeader->setName($headerImageFileName);

            $article->setHeaderImage($articleImageHeader);
        }

        $article->setUser($this->getUser());

        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();

        return $article;
    }
}
