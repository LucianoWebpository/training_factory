<?php

namespace App\Repository;

use App\Entity\Lessen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Lessen|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lessen|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lessen[]    findAll()
 * @method Lessen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LessenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lessen::class);
    }

    public function findLessenFromUser($user)
    {


        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT l
            FROM App\Entity\Lessen l
             JOIN  l.registraties r
            WHERE r.user = :user'
        )->setParameter('user', $user);
//        dd($query->getResult());
        // returns an array of Product objects
        return $query->getResult();
    }
    // /**
    //  * @return Lessen[] Returns an array of Lessen objects
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
    public function findOneBySomeField($value): ?Lessen
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
