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

	

	/**
	 * Get the value of identifiant
	 */ 
	public function getIdentifiant()
	{
		return $this->identifiant;
	}

	/**
	 * Set the value of identifiant
	 *
	 * @return  self
	 */ 
	public function setIdentifiant($identifiant)
	{
		$this->identifiant = $identifiant;

		return $this;
	}

	/**
	 * Get the value of espece
	 */ 
	public function getEspece()
	{
		return $this->espece;
	}

	/**
	 * Set the value of espece
	 *
	 * @return  self
	 */ 
	public function setEspece($espece)
	{
		$this->espece = $espece;

		return $this;
	}

	/**
	 * Get the value of nom
	 */ 
	public function getNom()
	{
		return $this->nom;
	}

	/**
	 * Set the value of nom
	 *
	 * @return  self
	 */ 
	public function setNom($nom)
	{
		$this->nom = $nom;

		return $this;
	}
}


