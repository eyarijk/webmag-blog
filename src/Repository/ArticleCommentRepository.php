<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\ArticleComment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ArticleComment|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleComment|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleComment[]    findAll()
 * @method ArticleComment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleCommentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ArticleComment::class);
    }

    /**
     * @param int|null $id
     * @param Article $article
     * @return ArticleComment|null
     */
    public function findByIdAndArticle(?int $id, Article $article): ?ArticleComment
    {
        if ($id === null) {
            return null;
        }

        return $this->findOneBy([
            'id' => $id,
            'article' => $article,
        ]);
    }

    /**
     * @param Article $article
     * @return ArticleComment[]
     */
    public function getByArticleAndSortByCreatedAtDesc(Article $article): array
    {
        return $this->createQueryBuilder('ac')
            ->where('ac.article = :article')
            ->orderBy('ac.createdAt', 'DESC')
            ->setParameter('article', $article)
            ->getQuery()
            ->getResult()
        ;
    }
}
