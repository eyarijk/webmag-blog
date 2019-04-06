<?php

namespace App\Repository;

use App\Entity\Tag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tag|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tag|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tag[]    findAll()
 * @method Tag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TagRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tag::class);
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
     * @return iterable
     */
    public function getEnabled(): iterable
    {
        return $this->createQueryBuilder('t')
            ->where('t.isEnabled = :isEnabled')
            ->setParameter('isEnabled', true)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @param int $offset
     * @param int $limit
     * @return iterable
     */
    public function paginateByLimitAndOffset(int $offset = 0, int $limit = 5): iterable
    {
        return $this->createQueryBuilder('t')
            ->setMaxResults($limit)
            ->setFirstResult($offset)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @return int
     */
    public function getCount(): int
    {
        return $this->createQueryBuilder('t')
            ->select('COUNT(t.id)')
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }

    /**
     * @param string $slug
     * @return bool
     */
    public function removeBySlug(string $slug): bool
    {
        return $this->createQueryBuilder('t')
            ->delete()
            ->where('t.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->execute()
        ;
    }
}
