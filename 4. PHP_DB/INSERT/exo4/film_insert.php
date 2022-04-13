<?php

require_once("../../config.php");

// Ajouter un nouveau film, avec récupérattion des erreurs de la BDD
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    $stmt = $pdo->prepare("INSERT INTO film (titre, duree, idcategorie) VALUES (:titre, :duree, :idcategorie)");
    $stmt->bindParam(':titre', $_GET["titre"]);
    $stmt->bindParam(':duree', $_GET["duree"]);
    $stmt->bindParam(':idcategorie', $_GET["idcategorie"]);

    $stmt->execute();
}
catch(Exception $e) {
    echo 'Exception -> ';
    var_dump($e->getMessage());
}