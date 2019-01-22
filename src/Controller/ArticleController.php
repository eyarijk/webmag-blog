<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\ArticleComment;
use App\Entity\ArticleLike;
use App\Entity\ArticleView;
use App\Form\ArticleCommentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ArticleController extends AbstractController
{
    /**
     * @param string $articleSlug
     * @param Request $request
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @return Response
     */
    public function index(string $articleSlug, Request $request): Response
    {
        $article = $this
            ->getDoctrine()
            ->getRepository(Article::class)
            ->findEnableBySlug($articleSlug)
        ;

        if ($article === null) {
            throw new NotFoundHttpException('Article ( slug: "' . $articleSlug . '") Not Found');
        }

        $commentForm = $this->createForm(ArticleCommentType::class);
        $commentForm->handleRequest($request);

        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            $this->saveComment($article, $commentForm);

            return $this->redirectToRoute('article_page', [
                'articleSlug' => $article->getSlug(),
            ]);
        }

        $this->checkView($article, $request->getClientIp(), $request->headers->get('user-agent'));

        $articleLikes = $this
            ->getDoctrine()
            ->getRepository(ArticleLike::class)
            ->getLikeByArticle($article)
        ;

        $articleDislikes = $this
            ->getDoctrine()
            ->getRepository(ArticleLike::class)
            ->getLikeByArticle($article, false)
        ;

        $articleComments = $this
            ->getDoctrine()
            ->getRepository(ArticleComment::class)
            ->getByArticleAndSortByCreatedAtDesc($article)
        ;

        $sortedComments = [];

        foreach ($articleComments as $comment) {
            $groupKey = $comment->getParentComment() !== null ? $comment->getParentComment()->getId() : 0;
            $sortedComments[$groupKey][] = $comment;
        }

        return $this->render('articles/index.html.twig', [
            'article' => $article,
            'commentForm' => $commentForm->createView(),
            'comments' => $sortedComments,
            'countComments' => \count($articleComments),
            'articleDislikes' => $articleDislikes,
            'articleLikes' => $articleLikes,
        ]);
    }

    /**
     * @param string $articleSlug
     * @param Request $request
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @return JsonResponse
     */
    public function like(string $articleSlug, Request $request): JsonResponse
    {
        $article = $this
            ->getDoctrine()
            ->getRepository(Article::class)
            ->findEnableBySlug($articleSlug)
        ;

        if ($article === null) {
            throw new NotFoundHttpException('Article ( slug: "' . $articleSlug . '") Not Found');
        }

        $this->checkLike(
            $article,
            (bool) $request->query->getInt('isLike'),
            $request->getClientIp(),
            $request->headers->get('user-agent')
        );

        $articleLikes = $this
            ->getDoctrine()
            ->getRepository(ArticleLike::class)
            ->getLikeByArticle($article)
        ;

        $articleDislikes = $this
            ->getDoctrine()
            ->getRepository(ArticleLike::class)
            ->getLikeByArticle($article, false)
        ;

        return new JsonResponse([
            'dislikes' => $articleDislikes,
            'likes' => $articleLikes,
        ]);
    }

    /**
     * @param Article $article
     * @param string $ip
     * @param string $userAgent
     * @return ArticleView
     */
    private function checkView(Article $article, string $ip, string $userAgent): ArticleView
    {
        $articleView = $this
            ->getDoctrine()
            ->getRepository(ArticleView::class)
            ->findByIpAndUserAgentAndArticle($article, $ip, $userAgent)
        ;

        if ($articleView === null) {
            $articleView = new ArticleView();

            $articleView
                ->setIp($ip)
                ->setUserAgent($userAgent)
                ->setArticle($article)
            ;

            $em = $this
                ->getDoctrine()
                ->getManager()
            ;

            $em->persist($articleView);
            $em->flush();
        }

        return $articleView;
    }

    /**
     * @param Article $article
     * @param bool $isLike
     * @param string $ip
     * @param string $userAgent
     * @return ArticleLike
     */
    private function checkLike(Article $article, bool $isLike, string $ip, string $userAgent): ArticleLike
    {
        $articleLike = $this
            ->getDoctrine()
            ->getRepository(ArticleLike::class)
            ->findByIpAndUserAgentAndArticle($article, $ip, $userAgent)
        ;

        if ($articleLike === null) {
            $articleLike = new ArticleLike();

            $articleLike
                ->setArticle($article)
                ->setIp($ip)
                ->setUserAgent($userAgent)
            ;
        }

        $articleLike->setIsLike($isLike);

        $em = $this
            ->getDoctrine()
            ->getManager()
        ;

        $em->persist($articleLike);
        $em->flush();

        return $articleLike;
    }

    /**
     * @param Article $article
     * @param FormInterface $form
     * @return ArticleComment
     */
    private function saveComment(Article $article, FormInterface $form): ArticleComment
    {
        /**
         * @var ArticleComment
         */
        $comment = $form->getData();

        $parentCommentId = $form
            ->get('parentCommentId')
            ->getData()
        ;

        $parentComment = $this
            ->getDoctrine()
            ->getRepository(ArticleComment::class)
            ->findByIdAndArticle($parentCommentId, $article)
        ;

        $comment
            ->setUser($this->getUser())
            ->setArticle($article)
            ->setParentComment($parentComment)
        ;

        $em = $this
            ->getDoctrine()
            ->getManager()
        ;

        $em->persist($comment);
        $em->flush();

        return $comment;
    }
}
