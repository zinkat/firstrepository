
<?php
require_once("logement.php");

class Maison extends Logement{
	private $jardin;
	private $piscine;
	private $garage;

	function __construct($adresse, $surface, $nbPieces, $prix, $jardin, $piscine, $garage){
        // parent::__construct($adresse, $surface, $nbPieces, $prix);
        $this->adresse = $adresse;
        $this->surface = $surface;
        $this->nbPieces = $nbPieces;
        $this->prix = $prix;

        $this->jardin = $jardin;
        $this->piscine = $piscine;
        $this->garage = $garage;
	}

    public function getJardin(){
        return $this->jardin;
    }
	
	public function getPiscine(){
        return $this->piscine;
    }

    public function getGarage(){
        return $this->garage;
    }

    public function setJardin($jardin){
        $this->jardin = $jardin;
    }
	
	public function setPiscine($piscine){
        $this->piscine = $piscine;
    }

    public function setGarage($garage){
        $this->garage = $garage;
    }
	
}


