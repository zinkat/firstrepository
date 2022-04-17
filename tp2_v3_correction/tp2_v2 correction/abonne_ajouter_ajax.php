<?php
include_once("_includes.php");

$db = new DB();
$pdo = $db->getDB();

if(isset($_GET["nom"]) && isset($_GET["prenom"]) && isset($_GET["idabonnement"])){
    // On fait l'insert ici
    $stmt = $pdo->prepare("INSERT INTO abonne (nom, prenom, idabonnement) VALUES (:nom, :prenom, :idabonnement)");
    $stmt->bindParam(':nom', $_GET["nom"]);
    $stmt->bindParam(':prenom', $_GET["prenom"]);
    $stmt->bindParam(':idabonnement', $_GET["idabonnement"]);

    $stmt->execute();
    echo "Abonné ajouté !";
}
else{
    echo "Merci de saisir des données !";
}