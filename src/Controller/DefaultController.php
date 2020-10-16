<?php

namespace App\Controller;

use App\Entity\ImmoVente;
use render;
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
		//connexion a doctrine
		// connexion au repository
		$repo = $this->getDoctrine()->getRepository(ImmoVente::class);
		$immobiliers = $repo->findAll();
        return $this->render('default/index.html.twig', [
            
            'controller_name' => 'DefaultController',
			'immobiliers'=>$immobiliers
        ]);
    }


/**
    * @Route("/article/{id}", name="index.affich")
    */
    // recuperation de l'identifiant
    public function affich($id) 
    {
        // Appel à Doctrine & au repository
        $repo = $this->getDoctrine()->getRepository(ImmoVente::class);

        //Recherche de l'article avec son identifiant
        $immobilier = $repo->find($id);
        // Passage à Twig de tableau avec des variables à utiliser
        return $this->render('default/affich.html.twig', [
            'controller_name' => 'DefaultController',
            'immobilier' => $immobilier
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

