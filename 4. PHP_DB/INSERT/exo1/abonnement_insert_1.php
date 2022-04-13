<?php

require_once("../../config.php");

// Ajouter un nouveau abonnement
$stmt = $pdo->prepare("INSERT INTO abonnement (abonnement, prix) VALUES (:abonnement, :prix)");
$stmt->bindParam(':abonnement', $_GET["abonnement"]);
$stmt->bindParam(':prix', $_GET["prix"]);

$stmt->execute();
