<?php

namespace App\Repository;

use App\Entity\Instrumentiste;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Instrumentiste|null find($id, $lockMode = null, $lockVersion = null)
 * @method Instrumentiste|null findOneBy(array $criteria, array $orderBy = null)
 * @method Instrumentiste[]    findAll()
 * @method Instrumentiste[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InstrumentisteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Instrumentiste::class);
    }

    // /**
    //  * @return Instrumentiste[] Returns an array of Instrumentiste objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Instrumentiste
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
