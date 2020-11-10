<?php

namespace App\Repository;

use App\Entity\GuinotLocation;
use App\Entity\Categorie;

use App\Data\SearchData;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @method Location|null find($id, $lockMode = null, $lockVersion = null)
 * @method Location|null findOneBy(array $criteria, array $orderBy = null)
 * @method Location[]    findAll()
 * @method Location[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GuinotLocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GuinotLocation::class);
    }

   
    /**
     * @return GuinotLocation[] Returns an array of GuinotLocation objects
     */
        public function findLastArticles()
        {
            return $this->findBy([], ['createdAt' => 'DESC']);
        }
    
   /**
    * Recherche de Locations 
    * @param
    * @param 
    * @return GuinotLocation[]
    * 
    */
    public function findSearch(){
        
        return $this->findAll();    
    }
    
    
    public function getPaginetedPage(int $page, int $length)
    {
        $queryBuilder = $this->createQueryBuilder("p")
                            ->orderBy("p.createdAt", "desc" )
                            ->setFirstResult($page - 1) //Position du Page X 5
                            ->setMaxResults($length)
                        ;
            return $queryBuilder->getQuery()->getResult();
    }


    /**
     * @return GuinotLocation[] Returns an array of GuinotLocation objects
     */
    public function findLastLocation(int $nb=5)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.status = :status')
            ->setParameter('status', 'PUBLISH')
            ->orderBy('createdAt', 'DESC')
            ->setMaxResults(nb)
            ->getQuery()
            ->getResult()
        ;
    }


    /** 
     * Recupère un produit en lien avec un bien
     * @return GuinotLocation[]
     * 
    */
    public function findLocaRech(SearchData $search): array
    {
        $query = $this
            ->createQueryBuilder('p')
            ->select('c', 'p')
            ->join('p.categorie', 'c');

            if (!empty($search->categories)) {
                $query = $query
                    ->andWhere('c.id IN (:categories)')
                    ->setParameter('categories', $search->categories);
            }

            if (!empty($search->min)) {
                $query = $query
                    ->andWhere('p.prix >= :min')
                    ->setParameter('min', $search->min);
            }
    
            if (!empty($search->max)) {
                $query = $query
                    ->andWhere('p.prix <= :max')
                    ->setParameter('max', $search->max);
            }

        return $query->getQuery()->getResult();
    }


    /**
    * Requetespour les Recherches des Terrains
    * @param 
    * @method findByCatTerrains()
    * 
    */
        public function findByCatTerrains()
        {
            $qb = $this->createQueryBuilder('p');      
            $qb
                ->innerJoin('App\Entity\Categorie',  'c', 'WITH', 'c = p.categorie')
                ->where('p.createdAt IS NOT NULL')
                ->andWhere('c.titre like :titre')
                ->setParameter('titre', 'Terrains');
               
                dump($qb->getQuery()->getResult());

            return $qb->getQuery()->getResult();
        }
        


        public function findByCatTerrains02(Categorie $categorie, $pageId)
        {
            $qb = $this->createQueryBuilder('p'); 
            //qb = $this->getEntityManager()->createQueryBuilder();
            //    ->add('select', 'p')
            //   ->from('Application\Model\Entity\Page', 'p')
            $qb 
               ->join('App\Entity\Categorie', 'c')
               ->sw
               ->where('p.id = :id')
               ->andWhere('c.titre = :titre')
               ->setParameter('titre', 'terrains')
               ->setParameter('pageId', $pageId);
        
            return $qb->getQuery()
                      ->setFetchMode("Application\Model\Entity\Page", "elements", "EAGER")
                      ->getResult();
        }




        /**
         * Requetes pour les Recherches des Appartements
         * @param 
         * @method
         * 
         */
        public function findByCatHostels()
        {
            $qb = $this->createQueryBuilder('p');
            $qb
                ->innerJoin('App\Entity\Categorie',  'c', 'WITH', 'c = p.categorie')
                ->where(
                    $qb->expr()->IsNotNull('p.createdAt'),
                    $qb->expr()->like('c.titre like :titre')
                )
                ->setParameter('titre', 'Hostels'); 
               // dump($qb->getQuery()->getResult());

            return $qb->getQuery()->getResult();
        }



        /**
         * Requetespour les Recherches des Appartements
         * @param 
         * @method
         *          * 
         */
        public function findByCatAppartements()
        {
            $qb = $this->createQueryBuilder('p');
            
            $qb
                ->innerJoin('App\Entity\Categorie',  'c', 'WITH', 'c = p.categorie')
                ->where('p.createdAt IS NOT NULL')
                ->andWhere('c.titre like :titre')
                ->setParameter('titre', 'Appartements'); 
               // dump($qb->getQuery()->getResult());

            return $qb->getQuery()->getResult();
        }
        /**
         * Requetespour les Recherches des Appartements
         * @param 
         * @method
         * 
         */
        public function findByCatMaisons()
        {
            $qb = $this->createQueryBuilder('p');
            
            $qb
                ->innerJoin('App\Entity\Categorie',  'c', 'WITH', 'c = p.categorie')
                ->where('p.createdAt IS NOT NULL')
                ->andWhere('c.titre like :titre')
                ->setParameter('titre', 'Maisons'); 
               // dump($qb->getQuery()->getResult());

            return $qb->getQuery()->getResult();
        }


     /**
      * @return Location[] Returns an array of Location objects
      */

    public function getLocationByPrixInterval($prixMin, $prixMax)
    {
        $query = $this->createQueryBuilder('p')
                        ->where('p.prix <= :prixmax')
                        ->andWhere('p.prix >= :prixmin')
                        ->setParameter(
                                array('prixmin'=> $prixMin,
                                      'prixmax'=> $prixMax
                                      )
                                    )
                        ->orderBy('p.id', 'ASC')
                        ->setMaxResults(10)

                        ->getQuery();
        return $query->getResult();
    }

    /** 
     * 
     * 
    */

/*        public function getLocation($categorie_id = null, $max = null)
        {
            $qb = $this->createQueryBuilder('e')
                ->orderBy('e.location', 'DESC');
     
            if($max)
            {
                $qb->setMaxResults($max);
            }
     
            if($category_id)
            {
                $qb->andWhere('e.categorie = :categorie_id')
                    ->setParameter('categorie_id', $categorie_id);
            }
     
            $query = $qb->getQuery();
     
            return $query->getResult();
        }


        public function findAllWithCategories()
        {
            $qb = $this->createQueryBuilder('a')
                ->innerJoin('a.categorie', 'c' )
                ->orderBy('a.categorie', 'ASC')
                ->addSelect('c')
                ->getQuery();
    
            return $qb->execute();
        }

        public function findLatest()
        {
            $qb = $this->createQueryBuilder('p')
                ->addSelect('a', 't')
                ->innerJoin('p.id', 'a')
                ->leftJoin('p.categories', 't')
                ->where('p.categories == :Maisons')
               # ->orderBy('p.publishedAt', 'DESC')
              #  ->setParameter('now', new \DateTime())
            ;
        }
            


/*
        public function findAllWithCategoriesAndTags()
        {
            $qb = $this->createQueryBuilder('a')
                ->innerJoin('a.categorie', 'c' )
                ->andWhere('c.categorie = :Maisons')
                ->addSelect('c')
                ->leftJoin('a.', 'Categorie' )
                ->addSelect('t')
                ->getQuery();
    
            return $qb->execute();
        }
*/
        
        // /**
    //  * @return Location[] Returns an array of Location objects
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
    public function findOneBySomeField($value): ?GuinotLocation
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
