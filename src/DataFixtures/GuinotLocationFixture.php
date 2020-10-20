<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\GuinotLocation;

class GuinotLocationFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        for ($i = 1; $i <= 20; $i++) {
            $GuinotLocation = new GuinotLocation();
            $GuinotLocation->setDenomination("Denomination n°$i ")
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
                

            $manager->persist($GuinotLocation);
        }

        $manager->flush();
    }
}
