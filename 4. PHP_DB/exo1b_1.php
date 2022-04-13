
<?php
require_once("config.php");
// films
// $stmt = $pdo->prepare("SELECT * FROM film LIMIT 25");

// $stmt->execute();

// $tableau = "<table>";
// $tableau.= "<tr>";
// $tableau.= "<th>id Film</th>";
// $tableau.= "<th>Titre</th>";
// $tableau.= "<th>Durée</th>";
// $tableau.= "</tr>";

// foreach($stmt->fetchAll() as $row){
//     // print_r($row);
//     $tableau.= "<tr>";
//     $tableau.= "<td>".$row["idfilm"]."</td>";
//     $tableau.= "<td>".$row["titre"]."</td>";
//     $tableau.= "<td>".$row["duree"]."</td>";
//     $tableau.= "</tr>";
// }
// $tableau.= "</table>";

// echo $tableau;

// Abonnés
$stmt = $pdo->prepare("SELECT *
                        FROM abonne
                            INNER JOIN abonnement ON abonne.idabonnement = abonnement.idabonnement
                        LIMIT 25");

$stmt->execute();

$tableau = "<table>";
$tableau.= "<tr>";
$tableau.= "<th>id abonne</th>";
$tableau.= "<th>Nom</th>";
$tableau.= "<th>Email</th>";
$tableau.= "<th>Abonnement</th>";
$tableau.= "<th>Modifier</th>";
$tableau.= "<th>Supprimer</th>";
$tableau.= "</tr>";

foreach($stmt->fetchAll() as $row){
    // print_r($row);
    $tableau.= "<tr>";
    $tableau.= "<td>";
        // $tableau.= "";
            $tableau.= $row["idabonne"];
        // $tableau.= "</a>";
    $tableau.= "</td>";
    $tableau.= "<td>".utf8_encode($row["nom"])."</td>";
    $tableau.= "<td>".$row["email"]."</td>";
    $tableau.= "<td>".$row["abonnement"]."</td>";
    
    $tableau.= "<td><a href='UPDATE/abonne_update.php?idabonne=".$row["idabonne"]."'>";
    $tableau.= "Modifier";
    $tableau.= "</a></td>";

    
    $tableau.= "<td>";
    $tableau.= "<a href='DELETE/abonne_delete.php?idabonne=".$row["idabonne"]."'>";
    $tableau.= "Supprimer";
    $tableau.= "</a></td>";
    $tableau.= "</tr>";
}
$tableau.= "</table>";

echo $tableau;