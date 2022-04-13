<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// $pdo = new PDO('mysql:host=127.0.0.1;dbname=ecommerce', 'root', 'root');
$pdo = new PDO('mysql:host=127.0.0.1;dbname=ecommerce', 'root', '');

$stmt = $pdo->prepare("SELECT * FROM produit ORDER BY idproduit ASC");//WHERE idproduit = :idproduit");
$stmt->bindParam(':idproduit', $idproduit);

$idproduit = '5';
$stmt->execute();

$result = $stmt->fetch(); // Affiche le 1° résultat (enregistrement)
// $result = $stmt->fetchAll(); // Affiche tous les enregistrements
print_r($result);

// foreach($result as $r){
//     print_r($r);
//     echo "<br/>";
//     echo "<br/>";
// }

