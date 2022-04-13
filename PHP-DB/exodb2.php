<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

$pdo = new PDO ('mysql: host=127.0.0.1; dbname=streaming' , 'root', 'root');

// afficher abonnement
$stmt = $pdo->prepare("SELECT * FROM abonnement");

$stmt->execute();

$tableau = '<table>';

$tableau.= '<tr>';
$tableau.= '<th>idabonnement</th>';
$tableau.= '<th>abonnement</th>';
$tableau.= '<th>prix</th>';
$tableau.= "</tr>";

foreach($stmt->fetchAll() as $row){
    // print_r($row);
    $tableau.= "<tr>";
    $tableau.= "<td>".$row ["idabonnement"]."</td>";
    $tableau.= "<td>".$row ["abonnement"]."</td>";
    $tableau.= "<td>".$row ["prix"]."</td>";
    $tableau.=  "</tr>";
}
$tableau.= "</table>";

echo $tableau;
//afficher abonnement de l'abonne 558
$stmt = $pdo->prepare("SELECT * FROM abonnement
                        INNER JOIN abonne ON abonne.idabonnement=abonnement.idabonnement
                        WHERE abonne.idabonne= 558;");

$stmt->execute();

$tableau = "<table>";
$tableau.= "<tr>";
$tableau.= "<th>idabonnement</th>";
$tableau.= "<th>Nom</th>";
$tableau.= "<th>idabonne</th>";
$tableau.= "<th>Abonnement</th>";
$tableau.= "</tr>";

foreach($stmt->fetchAll() as $row){
    // print_r($row);
    $tableau.= "<tr>";
    $tableau.= "<td>";
        // $tableau.= "";
            $tableau.= $row["idabonnement"];
        // $tableau.= "</a>";
    $tableau.= "</td>";
    $tableau.= "<td>".utf8_encode($row["nom"])."</td>";
    $tableau.= "<td>".$row["idabonne"]."</td>";
    $tableau.= "<td>".$row["abonnement"]."</td>";
    $tableau.= "</tr>";
}
$tableau.= "</table>";

echo $tableau;

// afficher film id 15
$stmt = $pdo->prepare("SELECT * FROM film  WHERE idfilm = 15;");

$stmt->execute();

$tableau = '<table>';

$tableau.= '<tr>';
$tableau.= '<th>idfilm</th>';
$tableau.= '<th>titre</th>';
$tableau.= "</tr>";

foreach($stmt->fetchAll() as $row){
    // print_r($row);
    $tableau.= "<tr>";
    $tableau.= "<td>".$row ["idfilm"]."</td>";
    $tableau.= "<td>".$row ["titre"]."</td>";
    $tableau.=  "</tr>";
}
$tableau.= "</table>";

echo $tableau;

// afficher abonne ayant regardé le film  id 741.


$stmt = $pdo->prepare("SELECT * FROM abonne
                        INNER JOIN historiques ON abonne.idabonne=historiques.idabonne
                        WHERE historiques.idfilm= 741;");

$stmt->execute();

$tableau = '<table>';

$tableau.= '<tr>';
$tableau.= '<th>idfilm</th>';
$tableau.= '<th>nom</th>';
$tableau.= "</tr>";

foreach($stmt->fetchAll() as $row){
    // print_r($row);
    $tableau.= "<tr>";
    $tableau.= "<td>".$row ["idfilm"]."</td>";
    $tableau.= "<td>".$row ["nom"]."</td>";
    $tableau.=  "</tr>";
}
$tableau.= "</table>";

echo $tableau;

// correction prof

// <?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// $pdo = new PDO('mysql:host=127.0.0.1;dbname=streaming', 'root', '');

// // Abonnement
// $stmt = $pdo->prepare("SELECT * FROM abonnement");

// $stmt->execute();

// $tableau = "<table>";
// $tableau.= "<tr>";
// $tableau.= "<th>id abonnement</th>";
// $tableau.= "<th>Abonnement</th>";
// $tableau.= "<th>Prix</th>";
// $tableau.= "</tr>";

// foreach($stmt->fetchAll() as $row){
//     $tableau.= "<tr>";
//     $tableau.= "<td>";
//     $tableau.= $row["idabonnement"];
//     $tableau.= "</td>";
//     $tableau.= "<td>".utf8_encode($row["abonnement"])."</td>";
//     $tableau.= "<td>".$row["prix"]."</td>";
//     $tableau.= "</tr>";
// }
// $tableau.= "</table>";

// // echo $tableau;









// // Afficher les informations de l’abonné avec l’id 558 
// $stmt = $pdo->prepare("SELECT * FROM abonne WHERE idabonne = :idabonne");//WHERE idproduit = :idproduit");
// $stmt->bindParam(':idabonne', $idabonne);

// $idabonne = 558;
// $stmt->execute();

// $result = $stmt->fetch();
// // print_r($result);

// // Afficher le nom du film ayant l’id 15
// $stmt = $pdo->prepare("SELECT * FROM film WHERE idfilm = :idfilm");//WHERE idproduit = :idproduit");
// $stmt->bindParam(':idfilm', $idfilm);

// $idfilm = 15;
// $stmt->execute();

// $result = $stmt->fetch();
// // print_r($result);

// // Afficher l’abonné qui a regardé le film id 741
// $stmt = $pdo->prepare("SELECT * 
//                         FROM historiques 
//                             INNER JOIN abonne ON historiques.idabonne = abonne.idabonne
//                         WHERE idfilm = :idfilm");
// $stmt->bindParam(':idfilm', $idfilm);

// $idfilm = 741;
// $stmt->execute();

// $tableau = "<table>";
// $tableau.= "<tr>";
// $tableau.= "<th>id film</th>";
// $tableau.= "<th>Nom Abonne</th>";
// $tableau.= "<th>Email</th>";
// $tableau.= "</tr>";

// foreach($stmt->fetchAll() as $row){
//     $tableau.= "<tr>";
//     $tableau.= "<td>";
//     $tableau.= $row["idfilm"];
//     $tableau.= "</td>";
//     $tableau.= "<td>".utf8_encode($row["nom"])."</td>";
//     $tableau.= "<td>".$row["email"]."</td>";
//     $tableau.= "</tr>";
// }
// $tableau.= "</table>";

// echo $tableau;











