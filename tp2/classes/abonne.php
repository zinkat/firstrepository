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
	public function getIdAbonne($idAbonne)
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
?>

<h1>Back Office - Vélib</h1>
<h3>Abonnée</h3>
<?php
include_once("../_includes.php");
	//Connect to MySQL using the PDO object.
    $db = new DB();
    $pdo = $db->getDB();
	//select a list of tables from the current MySQL database
	////Prepare our SQL statement,
    $stmt = $pdo->prepare("SELECT * FROM abonne LIMIT 25");
	//Execute the statement.
    $stmt->execute();
	//We fetch the results using fetchAll.
	$tables = $stmt->fetchAll(PDO::FETCH_NUM);
	echo "<table border=1>";
	echo "<tr>";
	echo "<th width=60>idabonne</th>";
	echo "<th width=60>nom</th>";
	echo "<th width=60>Prenom</th>";
	echo "<th width=60>idabonnement</th>";
	echo "<tr>";
	echo "</table>";
	foreach($tables as $table){
			echo "<table border=1>";
			
			echo "<tr>";
			echo "<td width=60>";
		     echo $table[0];
			 echo "</td>";
			 
			 echo "<td width=60>";
			 echo $table[1];
			 echo "</td>";
			 
			 echo "<td width=70>";
			 echo $table[2];
			 echo "</td>";
			
			 echo "<td width=60>";
			 echo $table[3];
			 echo "</td>";
			 echo "<tr>";
			 echo "</table>";
	}
	

	
	