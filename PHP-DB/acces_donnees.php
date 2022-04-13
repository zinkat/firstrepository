<?php

$dbh = new PDO ('mysql: host=127.0.0.1; dbname=ecommerce' , 'root', 'root');
// try {
    $pdo = new PDO ('mysql: host=127.0.0.1; dbname=ecommerce' , 'root', 'root');
//     foreach ($pdo->query ('SELECT *FROM produit') as $row){
//         print_r($row);
// }
//     $pdo = null;
// } 

// catch ( PDOException$e){
//     print"ERREUR !:" .$e->getmessage(). "<br/>";
//      die();
// }

$stmt = $pdo->prepare("SELECT*FROM produit WHERE idproduit=:idproduit");
$stmt->bindparam(':idproduit', $idproduit);

    $idproduit = "5";
    $stmt ->execute();
    $result =$stmt->fetch();//affiche le 1 resultat(enregistrement)
    //$result = $stmt->fetchall();//affiche tous les enregistrements
    //afficher les resultats:
    print_r($result);
