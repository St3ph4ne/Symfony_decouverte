<?php

namespace App\Repository;

use App\Entity\Orchestre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Orchestre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Orchestre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Orchestre[]    findAll()
 * @method Orchestre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrchestreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Orchestre::class);
    }

    // /**
    //  * @return Orchestre[] Returns an array of Orchestre objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Orchestre
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
