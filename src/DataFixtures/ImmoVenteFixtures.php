<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\ImmoVente;


class ImmoVenteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        // creation de l'occurence de 20 Biens
        
        for($i=1; $i<20; $i++){
            $immovente = new ImmoVente();
            $immovente->setTitre( "Titre Livre n°$i ")  
                     ->setDescription("Description du Bien Nom $i")  
                     ->setPhoto( "http://placehold.it/300x200")
                     ->setCreatedAt(new \DateTime());
            
            $manager->persist($immovente);          
        }
        
        $manager->flush();
    }
}
