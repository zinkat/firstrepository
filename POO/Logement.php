<?php
class logement{
	private $Adresse;
	private $Surface;
    private $NombreDePieces;
    private $Prix;
	
	function __construct($adresse, $Surface,$NombreDePieces,$Prix){
		$this->adresse = $adresse;
		$this->Surface = $Surface;
        $this->NombreDePieces = $NombreDePieces;
        $this->Prix = $Prix;
	}
	
	// getter / setter
	public function getAdresse(){
		return $this->Adresse;
	}
	public function setAdresse($Adresse){
		$this->nom = $Adresse;
	}
	
	public function getSurface(){
		return $this->Surface;
	}
	public function setSurface($Surface){
		$this->Surface = $Surface;
	}

    public function getNombreDePieces(){
		return $this->NombreDePieces;
	}
	public function setNombreDePieces($NombreDePieces){
		$this->nom = $NombreDePieces;
	}

    public function getPrix(){
		return $this->Prix;
	}
	public function setPrix($Prix){
		$this->nom = $Prix;
	}

    public function getPrixM2(){
        $PrixM2 =$this->prix / $this->surface;
		return $this->PrixM2;
	}

}

