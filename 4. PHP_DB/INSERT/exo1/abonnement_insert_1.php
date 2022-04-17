<?php

require_once("../../config.php");

if(isset($_GET["abonnement"]) && isset($_GET["prix"])){

    $stmt = $pdo->prepare("INSERT INTO abonnement (abonnement, prix) VALUES (
        :abonnement, :prix)");
    $stmt->bindParam(':abonnement', $_GET["abonnement"]);
    $stmt->bindParam(':prix', $_GET["prix"]);
    $stmt->execute();
    echo "Abonnement ajouté !";
}
else{
    echo "Merci de saisir des données !";
}