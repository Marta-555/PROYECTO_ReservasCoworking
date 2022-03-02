<?php

namespace App\Repository;

use App\Entity\Precio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Precio|null find($id, $lockMode = null, $lockVersion = null)
 * @method Precio|null findOneBy(array $criteria, array $orderBy = null)
 * @method Precio[]    findAll()
 * @method Precio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrecioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Precio::class);
    }

    // /**
    //  * @return Precio[] Returns an array of Precio objects
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
    public function findOneBySomeField($value): ?Precio
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
