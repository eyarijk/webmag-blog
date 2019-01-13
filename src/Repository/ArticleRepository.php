<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
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
     * @param Article $article
     * @param User $user
     * @param string $imageDir
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @return Article
     */
    public function save(Article $article, User $user, string $imageDir = ''): Article
    {
        $publishedAt = $article->getIsEnabled() === true ? new \DateTime() : null;
        $article->setPublishedAt($publishedAt);

        $mainImage = $article->getMainImage();

        if ($mainImage !== null) {
            $fileName = md5(uniqid('article_', false)) . '.' . $mainImage->guessExtension();

            $mainImage->move(
                $imageDir,
                $fileName
            );

            $article->setMainImage($fileName);
        }

        $article->setUser($user);

        $em = $this->getEntityManager();
        $em->persist($article);
        $em->flush();

        return $article;
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
     * @param int $limit
     * @return mixed
     */
    public function getMostRead(int $limit = 4)
    {
        return $this->createQueryBuilder('a')
            ->leftJoin('a.articleViews', 'av')
            ->where('a.isEnabled = 1')
            ->orderBy('COUNT(av.id)', 'desc')
            ->groupBy('a.id')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
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
}
