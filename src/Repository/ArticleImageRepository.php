<?php

namespace App\Repository;

use App\Entity\ArticleImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ArticleImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleImage[]    findAll()
 * @method ArticleImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleImageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ArticleImage::class);
    }

    /**
     * @param \DateTimeInterface $dateTime
     * @return mixed
     */
    public function findUselessToDateIterate(\DateTimeInterface $dateTime)
    {
        return $this->createQueryBuilder('ai')
            ->where('ai.createdAt < :createdAt AND article_main IS NULL AND article_header IS NULL')
            ->setParameter('createdAt', $dateTime)
            ->leftJoin('ai.articleMain', 'article_main')
            ->leftJoin('ai.articleHeader', 'article_header')
            ->getQuery()
            ->iterate()
        ;
    }
}
