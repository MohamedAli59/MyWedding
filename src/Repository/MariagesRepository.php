<?php

namespace App\Repository;

use App\Entity\Mariages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Mariages|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mariages|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mariages[]    findAll()
 * @method Mariages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MariagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mariages::class);
    }

    // /**
    //  * @return Mariages[] Returns an array of Mariages objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Mariages
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
