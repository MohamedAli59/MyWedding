<?php

namespace App\Repository;

use App\Entity\PrestationsMariages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PrestationsMariages|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrestationsMariages|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrestationsMariages[]    findAll()
 * @method PrestationsMariages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrestationsMariagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrestationsMariages::class);
    }

    // /**
    //  * @return PrestationsMariages[] Returns an array of PrestationsMariages objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PrestationsMariages
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
