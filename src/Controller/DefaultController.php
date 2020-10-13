<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    
    /** 
     * @Route("/", name="accueil")
    */
    public function accueil()
    {
        return $this->render('default/accueil.html.twig');
    }
    

    /**
     * @Route("/index", name="index")
     * 
     */
    public function index()
    {
        return $this->render('default/index.html.twig', [
            'day' => "mardi",
            'controller_name' => 'DefaultController',
        ]);
    }

    
}
