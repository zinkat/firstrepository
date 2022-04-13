<?php
require_once("logement.php");

class Appartement extends Logement{
	private $immeuble;
	private $etage;
	private $numero;
	private $syndicat;


	function __construct($adresse, $surface, $nbPieces, $prix, $immeuble, $etage, $numero, $syndicat){
        parent::__construct($adresse, $surface, $nbPieces, $prix);

        $this->immeuble = $immeuble;
        $this->etage = $etage;
        $this->numero = $numero;
        $this->syndicat = $syndicat;
	}

    
    public function __toString(){
        $str = "";

        $str.="Adresse : ".$this->adresse;
        $str.=" ";
        $str.="Surface : ".$this->surface;
        $str.=" ";
        $str.="nbPieces : ".$this->nbPieces;
        $str.=" ";

        return $str;
    }
	

	public function getImmeuble()
	{
		return $this->immeuble;
	}

	public function setImmeuble($immeuble)
	{
		$this->immeuble = $immeuble;

		return $this;
	}

	public function getEtage()
	{
		return $this->etage;
	}

	public function setEtage($etage)
	{
		$this->etage = $etage;

		return $this;
	}

	public function getNumero()
	{
		return $this->numero;
	}

	public function setNumero($numero)
	{
		$this->numero = $numero;

		return $this;
	}



	public function getSyndicat()
	{
		return $this->syndicat;
	}

	public function setSyndicat($syndicat)
	{
		$this->syndicat = $syndicat;

		return $this;
	}
}




















