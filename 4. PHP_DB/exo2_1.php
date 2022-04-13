<?php

require_once("config.php");
// Abonnement
$stmt = $pdo->prepare("SELECT * FROM abonnement");

$stmt->execute();

$tableau = "<table>";
$tableau.= "<tr>";
$tableau.= "<th>id abonnement</th>";
$tableau.= "<th>Abonnement</th>";
$tableau.= "<th>Prix</th>";
$tableau.= "</tr>";

foreach($stmt->fetchAll() as $row){
    $tableau.= "<tr>";
    $tableau.= "<td>";
    $tableau.= $row["idabonnement"];
    $tableau.= "</td>";
    $tableau.= "<td>".utf8_encode($row["abonnement"])."</td>";
    $tableau.= "<td>".$row["prix"]."</td>";
    $tableau.= "</tr>";
}
$tableau.= "</table>";

echo $tableau;









// Afficher les informations de l’abonné avec l’id 558 
$stmt = $pdo->prepare("SELECT * FROM abonne WHERE idabonne = :idabonne");//WHERE idproduit = :idproduit");
$stmt->bindParam(':idabonne', $idabonne);

$idabonne = 558;
$stmt->execute();

$result = $stmt->fetch();
// print_r($result);

// Afficher le nom du film ayant l’id 15
$stmt = $pdo->prepare("SELECT * FROM film WHERE idfilm = :idfilm");//WHERE idproduit = :idproduit");
$stmt->bindParam(':idfilm', $idfilm);

$idfilm = 15;
$stmt->execute();

$result = $stmt->fetch();
// print_r($result);

// Afficher l’abonné qui a regardé le film id 741
$stmt = $pdo->prepare("SELECT * 
                        FROM historiques 
                            INNER JOIN abonne ON historiques.idabonne = abonne.idabonne
                        WHERE idfilm = :idfilm");
$stmt->bindParam(':idfilm', $idfilm);

$idfilm = 741;
$stmt->execute();

$tableau = "<table>";
$tableau.= "<tr>";
$tableau.= "<th>id film</th>";
$tableau.= "<th>Nom Abonne</th>";
$tableau.= "<th>Email</th>";
$tableau.= "</tr>";

foreach($stmt->fetchAll() as $row){
    $tableau.= "<tr>";
    $tableau.= "<td>";
    $tableau.= $row["idfilm"];
    $tableau.= "</td>";
    $tableau.= "<td>".utf8_encode($row["nom"])."</td>";
    $tableau.= "<td>".$row["email"]."</td>";
    $tableau.= "</tr>";
}
$tableau.= "</table>";

echo $tableau;

