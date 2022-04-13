<?php
require_once("animal.php");

class Chien extends Animal{
    protected $niche;

    function __construct($identifiant, $espece, $nom, $niche){
        $this->identifiant = $identifiant;
        $this->espece = $espece;
        $this->nom = $nom;
        $this->niche = $niche;
	}

    public function tour(){
        echo "Faire une promenade";
    }

    

    /**
     * Get the value of niche
     */ 
    public function getNiche()
    {
        return $this->niche;
    }

    /**
     * Set the value of niche
     *
     * @return  self
     */ 
    public function setNiche($niche)
    {
        $this->niche = $niche;

        return $this;
    }
}