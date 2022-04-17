<?php

function getListeAbonnes(){
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=streaming', 'root', 'root');
    $stmt = $pdo->prepare("SELECT *
                            FROM abonne
                                INNER JOIN abonnement ON abonne.idabonnement = abonnement.idabonnement
                            LIMIT 25");

    $stmt->execute();
    return $stmt;
}

function getAbonneM($idAbonne){
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=streaming', 'root', 'root');
    $stmt = $pdo->prepare("SELECT *
                            FROM abonne
                                INNER JOIN abonnement ON abonne.idabonnement = abonnement.idabonnement
                            WHERE idabonne = :idabonne");
    $stmt->bindParam(':idabonne', $idAbonne);
    $stmt->execute();

    return $stmt;
}