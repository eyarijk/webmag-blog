<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\ArticleLike;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ArticleLike|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleLike|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleLike[]    findAll()
 * @method ArticleLike[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleLikeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ArticleLike::class);
    }

    /**
     * @param Article $article
     * @param bool $type
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @return mixed
     */
    public function getLikesCountByArticle(Article $article, bool $type)
    {
        return $this->createQueryBuilder('al')
            ->select('COUNT(al.id)')
            ->where('al.article = :article')
            ->andWhere('al.type = :type')
            ->setParameter('type', $type)
            ->setParameter('article', $article)
            ->getQuery()
            ->getSingleScalarResult()
        ;
    }

    /**
     * @param Article $article
     * @param string $ip
     * @param string $userAgent
     * @return ArticleLike
     */
    public function findByIpAndUserAgentAndArticle(Article $article, string $ip, string $userAgent): ?ArticleLike
    {
        return $this->findOneBy([
            'article' => $article,
            'ip' => $ip,
            'userAgent' => $userAgent,
        ]);
    }
}
