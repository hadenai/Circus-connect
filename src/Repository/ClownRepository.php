<?php

namespace App\Repository;

use App\Entity\Clown;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Clown|null find($id, $lockMode = null, $lockVersion = null)
 * @method Clown|null findOneBy(array $criteria, array $orderBy = null)
 * @method Clown[]    findAll()
 * @method Clown[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClownRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Clown::class);
    }

    // /**
    //  * @return Clown[] Returns an array of Clown objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Clown
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
