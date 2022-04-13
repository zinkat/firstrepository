<?php
require_once("animal.php");

class Chien extends Animal{

    function __construct($identifiant, $espece, $nom){
        $this->identifiant = $identifiant;
        $this->espece = $espece;
        $this->nom = $nom;
	}

    public function tour(){
        
    }
}