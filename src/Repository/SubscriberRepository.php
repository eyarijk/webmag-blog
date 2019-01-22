<?php

namespace App\Repository;

use App\Entity\Subscriber;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Subscriber|null find($id, $lockMode = null, $lockVersion = null)
 * @method Subscriber|null findOneBy(array $criteria, array $orderBy = null)
 * @method Subscriber[]    findAll()
 * @method Subscriber[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubscriberRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Subscriber::class);
    }

    /**
     * @param string $email
     * @return Subscriber|null
     */
    public function findByEmail(string $email): ?Subscriber
    {
        return $this->findOneBy([
            'email' => $email,
        ]);
    }

    /**
     * @return Query
     */
    public function getOrderByActiveQuery(): Query
    {
        return $this->createQueryBuilder('s')
            ->orderBy('s.isActive', 'DESC')
            ->getQuery()
        ;
    }
}
