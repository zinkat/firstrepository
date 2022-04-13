


<?php
require_once("./config.php");

// Ajouter un nouveau adhérant
$stmt = $pdo->prepare("INSERT INTO film (idcategorie, titre, duree) VALUES (:idcategorie, :titre, :duree)");
$stmt->bindParam(':titre', $_GET["titre"]);
$stmt->bindParam(':duree', $_GET["duree"]);
$stmt->bindParam(':idcategorie', $_GET["idcategorie"]);
$stmt -> execute();

// print_r($_GET);
