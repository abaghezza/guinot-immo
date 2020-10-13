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


	/**
     * @Route("/vente", name="vente")
     * 
     */
	 
   public function vente()
      {
        return $this->render('default/vente.html.twig');
    }
	
	
	/**
     * @Route("/location", name="location")
     * 
     */
	 
	public function location()
      {
        return $this->render('default/location.html.twig');
    }
	
	
	/**
     * @Route("/test", name="test")
     * 
     */
	 
	public function test()
      {
        return $this->render('default/test.html.twig');
    }
	
	
	/**
     * @Route("/administration", name="administration")
     * 
     */
	 
	public function administration()
      {
        return $this->render('default/administration.html.twig');
    }
	
	
	/**
     * @Route("/contact", name="contact")
     * 
     */
	 
	public function contact()
      {
        return $this->render('default/contact.html.twig');
    }
	
	/**
     * @Route("/apropos", name="apropos")
     * 
     */
	 
	public function apropos()
      {
        return $this->render('default/apropos.html.twig');
    }

/**
     * @Route("/affichage", name="affichage")
     * 
     */
	 
	public function affichage()
      {
        return $this->render('default/affichage.html.twig');
    }

}

