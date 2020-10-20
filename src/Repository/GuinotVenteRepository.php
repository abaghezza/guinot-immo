<?php

namespace App\Repository;

use App\Entity\GuinotVente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GuinotVente|null find($id, $lockMode = null, $lockVersion = null)
 * @method GuinotVente|null findOneBy(array $criteria, array $orderBy = null)
 * @method GuinotVente[]    findAll()
 * @method GuinotVente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuinotVenteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GuinotVente::class);
    }

    // /**
    //  * @return GuinotVente[] Returns an array of GuinotVente objects
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
    public function findOneBySomeField($value): ?GuinotVente
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
