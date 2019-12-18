<?php

namespace App\Repository;

use App\Entity\Leden;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Leden|null find($id, $lockMode = null, $lockVersion = null)
 * @method Leden|null findOneBy(array $criteria, array $orderBy = null)
 * @method Leden[]    findAll()
 * @method Leden[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LedenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Leden::class);
    }

    // /**
    //  * @return Leden[] Returns an array of Leden objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Leden
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
