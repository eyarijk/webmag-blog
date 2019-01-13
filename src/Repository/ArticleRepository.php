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
}
