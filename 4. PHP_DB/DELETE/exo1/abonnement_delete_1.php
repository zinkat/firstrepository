<?php
require_once("../../config.php");

$stmt = $pdo->prepare("DELETE FROM abonnement WHERE idabonnement = :idabonnement");
$stmt->bindParam(':idabonnement', $_GET["idabonnement"]);

$stmt->execute();
