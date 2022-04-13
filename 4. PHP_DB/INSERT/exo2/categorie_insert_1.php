<?php
require_once("../../config.php");

// Ajouter un nouveau abonnement
$stmt = $pdo->prepare("INSERT INTO categorie (categorie) VALUES (:categorie)");
$stmt->bindParam(':categorie', $_GET["categorie"]);

$stmt->execute();