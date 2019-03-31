<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Tag;
use App\Entity\User;
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
     * @param User $user
     * @return Query
     */
    public function getSortByIdDescByUserWithCountCommentAndCountViewsQuery(User $user): Query
    {
        return $this->createQueryBuilder('a')
            ->select('a as article')
            ->addSelect('c as category')
            ->addSelect('hi as headerImage')
            ->addSelect('mi as mainImage')
            ->addSelect('COUNT(ac.id) as countComments')
            ->addSelect('COUNT(av.id) as countView')
            ->leftJoin('a.articleComments','ac')
            ->leftJoin('a.articleViews','av')
            ->leftJoin('a.category','c')
            ->leftJoin('a.headerImage','hi')
            ->leftJoin('a.mainImage','mi')
            ->where('a.user = :user')
            ->setParameter('user', $user)
            ->groupBy('a.id')
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
            ->where('a.isEnabled = :isEnabled')
            ->setParameter('isEnabled', true)
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
            ->where('a.isEnabled = :isEnabled')
            ->setParameter('isEnabled', true)
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
            ->where('a.isEnabled = :isEnabled')
            ->setParameter('isEnabled', true)
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
            ->where('a.isEnabled = :isEnabled')
            ->setParameter('isEnabled', true)
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
            ->where('a.isEnabled = :isEnabled')
            ->andWhere('a.isMain = :isMain')
            ->setParameter('isEnabled', true)
            ->setParameter('isMain', true)
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
            ->where('a.isEnabled = :isEnabled')
            ->andWhere('a.isMain = :isMain')
            ->setParameter('isEnabled', true)
            ->setParameter('isMain', true)
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
            ->where('a.isEnabled = :isEnabled')
            ->setParameter('isEnabled', true)
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
            ->where('a.isEnabled = :isEnabled')
            ->setParameter('isEnabled', true)
            ->setParameter('category', $category)
            ->orderBy('a.publishedAt', 'DESC')
            ->getQuery()
        ;
    }

    /**
     * @param string $slug
     * @return Article|null
     */
    public function findEnableBySlug(string $slug): ?Article
    {
        return $this->findOneBy([
            'slug' => $slug,
            'isEnabled' => true,
        ]);
    }

    /**
     * @return Query
     */
    public function getPopularQuery(): Query
    {
        return $this->createQueryBuilder('a')
            ->leftJoin('a.articleViews', 'av')
            ->where('a.isEnabled = :isEnabled')
            ->setParameter('isEnabled', true)
            ->groupBy('a.id')
            ->orderBy('COUNT(av.id)', 'DESC')
            ->getQuery()
        ;
    }

    /**
     * @param \DateTimeInterface $date
     * @param int $limit
     * @return iterable
     */
    public function getPopularByDate(\DateTimeInterface $date, int $limit = 6): iterable
    {
        $to = new \DateTime($date->format('Y-m-d') . ' 23:59:59');
        $from = new \DateTime($date->format('Y-m-d') . ' 00:00:00');

        return $this->createQueryBuilder('a')
            ->leftJoin('a.articleViews', 'av')
            ->where('a.isEnabled = :isEnabled')
            ->andWhere('av.date BETWEEN :from AND :to')
            ->setParameter('to', $to)
            ->setParameter('from', $from)
            ->setParameter('isEnabled', true)
            ->groupBy('a.id')
            ->orderBy('COUNT(av.id)', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @param Tag $tag
     * @param int $limit
     * @return array
     */
    public function getMainByTag(Tag $tag, int $limit = 2): array
    {
        return $this->createQueryBuilder('a')
            ->innerJoin('a.tags', 't', Expr\Join::WITH, 't.id = :tag')
            ->where('a.isEnabled = :isEnabled')
            ->andWhere('a.isMain = :isMain')
            ->setParameter('isEnabled', true)
            ->setParameter('isMain', true)
            ->setParameter('tag', $tag)
            ->orderBy('a.publishedAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @param Tag $tag
     * @return Query
     */
    public function getByTagQuery(Tag $tag): Query
    {
        return $this->createQueryBuilder('a')
            ->innerJoin('a.tags', 't', Expr\Join::WITH, 't.id = :tag')
            ->where('a.isEnabled = :isEnabled')
            ->setParameter('isEnabled', true)
            ->setParameter('tag', $tag)
            ->orderBy('a.publishedAt', 'DESC')
            ->getQuery()
        ;
    }
}
