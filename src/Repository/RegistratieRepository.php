<?php

namespace App\Repository;

use App\Entity\Registratie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Registratie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Registratie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Registratie[]    findAll()
 * @method Registratie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegistratieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Registratie::class);
    }

    // /**
    //  * @return Registratie[] Returns an array of Registratie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Registratie
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
