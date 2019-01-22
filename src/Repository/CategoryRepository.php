<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\Query\Expr;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Category::class);
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
     * @return array
     */
    public function getEnabledWithCountArticles(): array
    {
        return $this->createQueryBuilder('c')
            ->select('c as category', 'COUNT(a.id) as articleCount')
            ->leftJoin('c.articles', 'a', Expr\Join::WITH, 'a.isEnabled = 1')
            ->where('c.isEnabled = :isEnabled')
            ->setParameter('isEnabled', true)
            ->orderBy('articleCount', 'DESC')
            ->groupBy('c.id')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return array
     */
    public function getForMenu(): array
    {
        return $this->createQueryBuilder('c')
            ->where('c.isEnabled = :isEnabled')
            ->andWhere('c.isShowMenu = :isShowMenu')
            ->setParameter('isEnabled', true)
            ->setParameter('isShowMenu', true)
            ->setMaxResults(4)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @param string $slug
     * @return Category|null
     */
    public function findEnableBySlug(string $slug): ?Category
    {
        return $this->findOneBy([
            'slug' => $slug,
            'isEnabled' => true,
        ]);
    }
}
