<?php

namespace App\Repository;

use App\Entity\ImmoVente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImmoVente|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImmoVente|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImmoVente[]    findAll()
 * @method ImmoVente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImmoVenteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImmoVente::class);
    }

    // /**
    //  * @return ImmoVente[] Returns an array of ImmoVente objects
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
    public function findOneBySomeField($value): ?ImmoVente
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
