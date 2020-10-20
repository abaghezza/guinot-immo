<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\GuinotVente;

class GuinotVenteFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        // creation de l'occurence de 20 Biens

        for ($i = 1; $i <= 20; $i++) {
            $GuinotVente = new GuinotVente();
            $GuinotVente->setDenomination("Denomination n°$i ")
                ->setCreatedAt(new \DateTime())
                ->setCategorie("Catégorie n°$i ")
                ->setPhoto("http://placehold.it/300x200")
                ->setDescription("Description du Bien N° $i")
                ->setSurface("$i")
                ->setChambre("$i")
                ->setTypeMaison("Type_maison $i")
                ->setEtage("true")
                ->setCout("$i")
                ->setAdresse("adresse N° $i")
                ->setAccessibilite("$i");
                

            $manager->persist($GuinotVente);
        }

        $manager->flush();
    }
}
