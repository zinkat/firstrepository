<?php
include_once("_includes.php");

$db = new DB();
$pdo = $db->getDB();

$stmt = $pdo->prepare("SELECT *
                        FROM abonne
                        INNER JOIN abonnement ON abonne.idabonnement = abonnement.idabonnement
                        WHERE idabonne = :idabonne");
$stmt->bindParam(':idabonne', $_GET["idabonne"]);
$stmt->execute();
$resultat = $stmt->fetch();

?>

<h1>Back Office - Vélib</h1>
<h2>><?php echo ucfirst(LANGUE["abonne_detail"]); ?></h2>

<?php

    echo "<img src='images/abonnes/".$resultat["idabonne"].".jpg'  width='150' height='150'/>";
    echo "<br/>";
    echo "<b>idAbonne</b>"." ".$resultat["idabonne"];
    echo "<br/>";
    echo "<b>".ucfirst(LANGUE["nom"])."</b> ".$resultat["nom"];
    echo "<br/>";
    echo "<b>".ucfirst(LANGUE["prenom"])."</b> ".$resultat["prenom"];
    echo "<br/>";
    echo "<br/>";

    echo "<b>".ucfirst(LANGUE["abonnement"])."</b>";
    echo "<br/>";
    echo "<b>".ucfirst(LANGUE["libelle"])."</b> ".$resultat["libelle"];
    echo "<br/>";
    echo "<b>".ucfirst(LANGUE["prix"])."</b> ".$resultat["prix"]."€";
    
?>