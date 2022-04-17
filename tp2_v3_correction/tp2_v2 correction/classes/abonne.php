<?php
include_once("abonnement.php");
class Abonne{
	protected int $idAbonne;
	protected string $nom;
	protected string $prenom;
	protected Abonnement $abonnement;

	public function __construct($idAbonne, $nom, $prenom, $abonnement)
	{
		$this->idAbonne = $idAbonne;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->abonnement = $abonnement;
	}

	/**
	 * Get the value of idAbonne
	 */ 
	public function getIdAbonne()
	{
		return $this->idAbonne;
	}

	/**
	 * Set the value of idAbonne
	 *
	 * @return  self
	 */ 
	public function setIdAbonne($idAbonne)
	{
		$this->idAbonne = $idAbonne;

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

	/**
	 * Get the value of abonnement
	 */ 
	public function getAbonnement()
	{
		return $this->abonnement;
	}

	/**
	 * Set the value of abonnement
	 *
	 * @return  self
	 */ 
	public function setAbonnement($abonnement)
	{
		$this->abonnement = $abonnement;

		return $this;
	}


	/**
	 * Get the value of prenom
	 */ 
	public function getPrenom()
	{
		return $this->prenom;
	}

	/**
	 * Set the value of prenom
	 *
	 * @return  self
	 */ 
	public function setPrenom($prenom)
	{
		$this->prenom = $prenom;

		return $this;
	}
}