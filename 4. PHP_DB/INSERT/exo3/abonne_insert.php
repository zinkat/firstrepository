<?php
require_once("../../config.php");

// Ajouter un nouveau adhérant
$stmt = $pdo->prepare("INSERT INTO abonne (nom, email, idabonnement, idadresse) VALUES (:nom, :email, :idabonnement, :idadresse)");
$stmt->bindParam(':nom', $_GET["nom"]);
$stmt->bindParam(':email', $_GET["email"]);
$stmt->bindParam(':idabonnement', $_GET["idabonnement"]);
$stmt->bindParam(':idadresse', $_GET["idadresse"]);

$stmt->execute();

// print_r($_GET);