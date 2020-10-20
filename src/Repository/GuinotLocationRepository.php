<?php

namespace App\Repository;

use App\Entity\GuinotLocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GuinotLocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method GuinotLocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method GuinotLocation[]    findAll()
 * @method GuinotLocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuinotLocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GuinotLocation::class);
    }

    // /**
    //  * @return GuinotLocation[] Returns an array of GuinotLocation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GuinotLocation
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
