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
     * @param Article $article
     * @return array
     */
    public function findRootByArticleOrderByCreatedDesc(Article $article): array
    {
        return $this->createQueryBuilder('ac')
            ->where('ac.article = :article')
            ->andWhere('ac.parent is NULL')
            ->setParameter('article', $article)
            ->orderBy('ac.createdAt', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @param Article $article
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @return int
     */
    public function getCountCommentsByArticle(Article $article): int
    {
        return $this->createQueryBuilder('ac')
            ->select('COUNT(ac.id)')
            ->where('ac.article = :article')
            ->setParameter('article', $article)
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }
}
