<?php

namespace App\Repository;

use App\Entity\Lid;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Lid|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lid|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lid[]    findAll()
 * @method Lid[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LidRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lid::class);
    }

    // /**
    //  * @return Lid[] Returns an array of Lid objects
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
    public function findOneBySomeField($value): ?Lid
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
