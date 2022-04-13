<?php
class Personne{
	private $nom;
	private $prenom;
	
	function __construct($nom, $prenom){
		$this->nom = $nom;
		$this->prenom = $prenom;
	}
	
	// getter / setter
	public function getNom(){
		return $this->nom;
	}
	public function setNom($nom){
		$this->nom = $nom;
	}
	
	public function getPrenom(){
		return $this->prenom;
	}
	public function setPrenom($prenom){
		$this->prenom = $prenom;
	}
}

