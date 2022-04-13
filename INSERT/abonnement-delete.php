<?php
require_once("./config.php");

$stmtAbonnement = $pdo->prepare("DELETE  FROM abonnement WHERE idabonnement = :idabonnement");
$stmtAbonnement->bindParam(':idabonnement' , $_GET["idabonnement"]);

$stmtAbonnement->execute();


?>

