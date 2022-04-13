<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);


$pdo = new PDO ('mysql: host=127.0.0.1; dbname=streaming' , 'root', 'root');

// $stmt = $pdo->prepare("SELECT*FROM film LIMIT 25");  

// $stmt ->execute();

// //$result= $stmt-> fetch();
// $result= $stmt-> fetchAll();
// print_r($result);



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
    $tableau.= "</tr>";
}
$tableau.= "</table>";

echo $tableau;





// // function Chrono($TotSec) {
// //     $heures  =  bcdiv($TotSec,  3600,  0);
// //     $minutes  =  (bcdiv($TotSec,  60,  0)  %  60);
// //     $secondes = $TotSec-(($heures * 3600) + ($minutes * 60));
// //     return $heures  .  ":"  .  $minutes  .  ":"  .  $secondes;