<?php

namespace App\Controller\Article;

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
use Symfony\Contracts\Translation\TranslatorInterface;
use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;

class ArticleController extends AbstractController
{
    /**
     * @param Article $article
     * @param Request $request
     * @param Breadcrumbs $breadcrumbs
     * @param TranslatorInterface $translator
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @return Response
     */
    public function index(Article $article, Request $request, Breadcrumbs $breadcrumbs, TranslatorInterface $translator): Response
    {
        $commentForm = $this->createForm(ArticleCommentType::class);
        $commentForm->handleRequest($request);

        if ($commentForm->isSubmitted() && $commentForm->isValid()) {
            $this->persistComment($article, $commentForm);

            return $this->redirectToRoute('article_page', [
                'slug' => $article->getSlug(),
            ]);
        }

        $this->incrementView($article, $request->getClientIp(), $request->headers->get('user-agent'));

        $countLikes = $this
            ->getDoctrine()
            ->getRepository(ArticleLike::class)
            ->getLikesCountByArticle($article, ArticleLike::TYPE_LIKE)
        ;

        $countDislikes = $this
            ->getDoctrine()
            ->getRepository(ArticleLike::class)
            ->getLikesCountByArticle($article, ArticleLike::TYPE_DISLIKE)
        ;

        $comments = $this->getDoctrine()
            ->getRepository(ArticleComment::class)
            ->findRootByArticleOrderByCreatedDesc($article)
        ;

        $countComments = $this
            ->getDoctrine()
            ->getRepository(ArticleComment::class)
            ->getCountCommentsByArticle($article)
        ;

        $category = $article->getCategory();

        $breadcrumbs
            ->addRouteItem('breadcrumbs.home', 'home')
            ->addRouteItem($category->getTitle(), 'category_page', ['slug' => $category->getSlug()])
            ->addItem($article->getTitle())
        ;

        return $this->render('articles/index.html.twig', [
            'article' => $article,
            'comments' => $comments,
            'commentForm' => $commentForm->createView(),
            'countDislikes' => $countDislikes,
            'countLikes' => $countLikes,
            'countComments' => $countComments,
        ]);
    }

    /**
     * @param Article $article
     * @param Request $request
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @return JsonResponse
     */
    public function like(Article $article, Request $request): JsonResponse
    {
        $this->addLikeIfNotAlreadyLiked(
            $article,
            (bool) $request->query->getInt('type'),
            $request->getClientIp(),
            $request->headers->get('user-agent')
        );

        $articleLikes = $this
            ->getDoctrine()
            ->getRepository(ArticleLike::class)
            ->getLikesCountByArticle($article, ArticleLike::TYPE_LIKE)
        ;

        $articleDislikes = $this
            ->getDoctrine()
            ->getRepository(ArticleLike::class)
            ->getLikesCountByArticle($article, ArticleLike::TYPE_DISLIKE)
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
    private function incrementView(Article $article, string $ip, string $userAgent): ArticleView
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
     * @param bool $type
     * @param string $ip
     * @param string $userAgent
     * @return ArticleLike
     */
    private function addLikeIfNotAlreadyLiked(Article $article, bool $type, string $ip, string $userAgent): ArticleLike
    {
        $articleLike = $this
            ->getDoctrine()
            ->getRepository(ArticleLike::class)
            ->findByIpAndUserAgentAndArticle($article, $ip, $userAgent)
        ;

        $em = $this
            ->getDoctrine()
            ->getManager()
        ;

        if ($articleLike === null) {
            $articleLike = new ArticleLike();

            $articleLike
                ->setArticle($article)
                ->setIp($ip)
                ->setUserAgent($userAgent)
            ;

            $em->persist($articleLike);
        }

        $articleLike->setType($type);

        $em->flush();

        return $articleLike;
    }

    /**
     * @param Article $article
     * @param FormInterface $form
     * @return ArticleComment
     */
    private function persistComment(Article $article, FormInterface $form): ArticleComment
    {
        /**
         * @var ArticleComment
         */
        $comment = $form->getData();

        $comment->setArticle($article);

        $parentCommentId = $form
            ->get('parentCommentId')
            ->getData()
        ;

        if ($parentCommentId !== null) {
            $parentComment = $this
                ->getDoctrine()
                ->getRepository(ArticleComment::class)
                ->find($parentCommentId)
            ;

            $comment->setParent($parentComment);
        }

        $em = $this
            ->getDoctrine()
            ->getManager()
        ;

        $em->persist($comment);
        $em->flush();

        return $comment;
    }
}
