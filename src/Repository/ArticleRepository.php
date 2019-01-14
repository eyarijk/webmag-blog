<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\Query\Expr;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    /**
     * ArticleRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Article::class);
    }

    /**
     * @return Query
     */
    public function getSortByIdDescQuery(): Query
    {
        return $this->createQueryBuilder('t')
            ->orderBy('t.id', 'DESC')
            ->getQuery()
        ;
    }

    /**
     * @param int $limit
     * @return mixed
     */
    public function getRecent(int $limit = 6)
    {
        return $this->createQueryBuilder('a')
            ->where('a.isEnabled = 1')
            ->orderBy('a.publishedAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @param int $limit
     * @return mixed
     */
    public function getFeatured(int $limit = 3)
    {
        return $this->createQueryBuilder('a')
            ->leftJoin('a.articleComments', 'ac')
            ->where('a.isEnabled = 1')
            ->orderBy('COUNT(ac.id)', 'desc')
            ->groupBy('a.id')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Query
     */
    public function getMostReadQuery(): Query
    {
        return $this->createQueryBuilder('a')
            ->leftJoin('a.articleViews', 'av')
            ->where('a.isEnabled = 1')
            ->orderBy('COUNT(av.id)', 'desc')
            ->groupBy('a.id')
            ->getQuery()
        ;
    }

    /**
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @return int
     */
    public function getEnabledCount(): int
    {
        $result = $this->createQueryBuilder('a')
            ->select('COUNT(a.id) as articleCount')
            ->where('a.isEnabled = 1')
            ->getQuery()
            ->getSingleResult()
        ;

        return $result['articleCount'];
    }

    /**
     * @param int $limit
     * @return array
     */
    public function getMain(int $limit = 2): array
    {
        return $this->createQueryBuilder('a')
            ->where('a.isEnabled = 1')
            ->where('a.isMain = 1')
            ->orderBy('a.publishedAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @param Category $category
     * @param int $limit
     * @return array
     */
    public function getMainByCategory(Category $category, int $limit = 2): array
    {
        return $this->createQueryBuilder('a')
            ->innerJoin('a.category', 'c', Expr\Join::WITH, 'c.id = :category')
            ->where('a.isEnabled = 1')
            ->where('a.isMain = 1')
            ->setParameter('category', $category)
            ->orderBy('a.publishedAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Query
     */
    public function getNewQuery(): Query
    {
        return $this->createQueryBuilder('a')
            ->where('a.isEnabled = 1')
            ->orderBy('a.publishedAt', 'DESC')
            ->getQuery()
        ;
    }

    /**
     * @param Category $category
     * @return Query
     */
    public function getByCategoryQuery(Category $category): Query
    {
        return $this->createQueryBuilder('a')
            ->innerJoin('a.category', 'c', Expr\Join::WITH, 'c.id = :category')
            ->where('a.isEnabled = 1')
            ->setParameter('category', $category)
            ->orderBy('a.publishedAt', 'DESC')
            ->getQuery()
        ;
    }
}
