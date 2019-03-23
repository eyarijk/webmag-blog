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

    public function removeOldImages(\DateTimeInterface $dateTime)
    {
        return $this->createQueryBuilder('ai')
            ->where('ai.createdAt < :createdAt')
//            ->andWhere(function () {
//                //: TODO Add where for null articleMain or articleHeader:
//            })
            ->setParameter('createdAt',$dateTime)
            ->leftJoin('ai.articleMain','article_main')
            ->leftJoin('ai.articleHeader','article_header')
            ->getQuery()
            ->getResult()
        ;
    }

}
