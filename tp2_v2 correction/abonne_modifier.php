<?php
include_once("_includes.php");

$db = new DB();
$pdo = $db->getDB();

$stmtUpdate = $pdo->prepare("UPDATE abonne SET 
                                nom = :nom, 
                                prenom = :prenom, 
                                idabonnement = :idabonnement 
                                WHERE idabonne = :idabonne");

$stmtUpdate->bindParam(':nom', $_GET["nom"]);
$stmtUpdate->bindParam(':prenom', $_GET["prenom"]);
$stmtUpdate->bindParam(':idabonnement', $_GET["idabonnement"]);
$stmtUpdate->bindParam(':idabonne', $_GET["idabonne"]);
$stmtUpdate->execute();

?>