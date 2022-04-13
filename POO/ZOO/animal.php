<?php
abstract class Animal{
	protected $identifiant;
	protected $espece;
	protected $nom;
	
	function __construct($identifiant, $espece, $nom){
		$this->identifiant = $identifiant;
        $this->espece = $espece;
        $this->nom = $nom;
	}

    public abstract function tour();
}


