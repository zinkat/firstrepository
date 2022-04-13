<?php
class Abonnement{
	protected int $idAbonnement;
	protected string $libelle;
	protected float $prix;
    
	public function __construct($idAbonnement,$libelle,$prix)
	{
		$this->idAbonnement = $idAbonnement;
		$this->libelle = $libelle;
		$this->prix = $prix;
	}

	
	/**
	 * Get the value of idAbonnement
	 */ 
	public function getIdAbonnement()
	{
		return $this->idAbonnement;
	}

	/**
	 * Set the value of idAbonnement
	 *
	 * @return  self
	 */ 
	public function setIdAbonnement($idAbonnement)
	{
		$this->idAbonnement = $idAbonnement;

		return $this;
	}


	/**
	 * Get the value of prix
	 */ 
	public function getPrix()
	{
		return $this->prix;
	}

	/**
	 * Set the value of prix
	 *
	 * @return  self
	 */ 
	public function setPrix($prix)
	{
		$this->prix = $prix;

		return $this;
	}

	/**
	 * Get the value of libelle
	 */ 
	public function getLibelle()
	{
		return $this->libelle;
	}

	/**
	 * Set the value of libelle
	 *
	 * @return  self
	 */ 
	public function setLibelle($libelle)
	{
		$this->libelle = $libelle;

		return $this;
	}
}
?>
<h1>Back Office - Vélib</h1>
<h3>Abonnement</h3>