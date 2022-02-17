<?php

namespace App\Repository;

use App\Entity\Compositeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Compositeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Compositeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Compositeur[]    findAll()
 * @method Compositeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompositeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Compositeur::class);
    }

    // /**
    //  * @return Compositeur[] Returns an array of Compositeur objects
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
    public function findOneBySomeField($value): ?Compositeur
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
