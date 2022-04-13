<?php
require_once("animal.php");

class Chat extends Animal{

    function __construct($identifiant, $espece, $nom){
        $this->identifiant = $identifiant;
        $this->espece = $espece;
        $this->nom = $nom;
	}

    public function tour(){
        
    }
}