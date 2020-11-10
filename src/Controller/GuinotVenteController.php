<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class VenteController extends AbstractController
{
    /**
     * @Route("/vente", name="vente.index")
     */
    public function index()
    {
        return $this->render('vente/admin.html.twig', [
            'controller_name' => 'VenteController',
        ]);
    }
}
