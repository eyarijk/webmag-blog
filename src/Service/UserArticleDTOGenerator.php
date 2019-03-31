<?php

namespace App\Service;

use App\DTO\UserArticleListDTO;
use App\Entity\Article;
use App\Entity\ArticleImage;
use Symfony\Component\Routing\RouterInterface;

class UserArticleDTOGenerator
{
    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var string
     */
    private $imagesPublicPath;

    /**
     * UserArticleDTOGenerator constructor.
     * @param RouterInterface $router
     * @param string $imagesPublicPath
     */
    public function __construct(RouterInterface $router, string $imagesPublicPath)
    {
        $this->router = $router;
        $this->imagesPublicPath = rtrim($imagesPublicPath, '/') . '/';
    }

    /**
     * @param array $articleWithCounters
     * @return UserArticleListDTO
     */
    public function generate(array $articleWithCounters): UserArticleListDTO
    {
        /**
         * @var Article $article
         */
        $article = $articleWithCounters['article'];

        $link = $this->router->generate('user_articles_edit',[
            'slug' => $article->getSlug(),
        ]);

        $linkPublic = $this->router->generate('article_page', [
            'slug' => $article->getSlug(),
        ]);

        $userArticle = new UserArticleListDTO();

        $userArticle->setTitle($article->getTitle());
        $userArticle->setCategory($article->getCategory());
        $userArticle->setPublishedAt($article->getPublishedAt());
        $userArticle->setShortDescription($article->getShortDescription());
        $userArticle->setCountView($articleWithCounters['countView']);
        $userArticle->setCountComments($articleWithCounters['countComments']);
        $userArticle->setEditLink($link);
        $userArticle->setLinkPublic($linkPublic);
        $userArticle->setMainImageUrl($this->concatImageUrl($article->getMainImage()));
        $userArticle->setHeaderImageUrl($this->concatImageUrl($article->getHeaderImage()));

        return $userArticle;
    }

    /**
     * @param ArticleImage|null $image
     * @return null|string
     */
    private function concatImageUrl(?ArticleImage $image): ?string
    {
        return $image === null ? null : $this->imagesPublicPath . $image->getName();
    }
}
