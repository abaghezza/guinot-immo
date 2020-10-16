<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\entity\ImmoVente;
class ImmoVenteFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

for($i=1; $i<20; $i++){
            $immobilier = new ImmoVente();
            $immobilier->setTitre(" Bien n°$i")
                        ->setDescription("... sur la mise en page elle-même. L'avantage du Lorem Ipsum sur un texte générique comme 'Du texte. Du texte. Du texte.' est qu'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour 'Lorem Ipsum' vous conduira vers de nombreux sites qui n'en sont encore qu'à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellemen")
						->setCreatedAt(new \DateTime())
        ->setPhoto("http://placehold.it/300x200");
                        
            $manager->persist($immobilier);
							}
        $manager->flush();
    }
}
