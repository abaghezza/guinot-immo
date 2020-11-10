<?php

namespace App\Model;

use App\Entity\Categorie;
use App\Form\FilterType;


class Filter
{
/**
 * @var string
 * @IgnoreAnnotation("categorie")
 */
    private $keyword;

   /** 
    * @Categorie
   */
    private $categorie;


    /**
     * Get the value of keyword
     *
     * @return  string
     */ 
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * Set the value of categorie
     *
     * @return  self
     */ 
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get the value of categorie
     */ 
    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }
}
