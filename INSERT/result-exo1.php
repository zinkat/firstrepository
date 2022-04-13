<?php
require_once("../config.php");

//echo $_GET["idabonnement"]." ".  $_GET["nom"]." ".$_GET["email"]." ".$_GET["adresse"] ;

//echo $_GET["abonnement"]
//echo ".$_GET["categorie"]."
//." ".$_GET["prix"]
$pdo = new PDO ('mysql: host=127.0.0.1; dbname=streaming' , 'root', 'root');
//  ajout abonnement
// $stmt = $pdo->prepare("INSERT INTO abonnement(abonnement , prix) VALUE  (:abonnement , :prix)");
// $stmt->bindParam(':abonnement', $_GET['abonnement']);
// $stmt->bindParam(':prix', $_GET['prix']);

// $stmt->execute();

//ajout categorie

// $stmt = $pdo->prepare("INSERT into categorie(categorie) VALUE  (:categorie)");
// $stmt->bindParam(':categorie', $_GET['categorie']);

// $stmt->execute();

// ajout abonne

// $stmt = $pdo->prepare("INSERT INTO abonnement(abonnement , prix) VALUE  (:abonnement , :prix)");
// $stmt->bindParam(':abonnement', $_GET['abonnement']);
// $stmt->bindParam(':prix', $_GET['prix']);

// $stmt->execute();














// correction prof

// <form action="abonnement_insert.php" method="GET">
//     <div>
//         <label for="abonnement">Abonnement (libelle) :</label>
//         <input type="text" id="abonnement" name="abonnement">
//     </div>
//     <div>
//         <label for="prix">Prix :</label>
//         <input type="number" id="prix" name="prix">
//     </div>
//     <input type="submit" value="Submit" />
// </form>

// <?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);



// $pdo = new PDO('mysql:host=127.0.0.1;dbname=streaming', 'root', '');

// // Ajouter un nouveau abonnement
// $stmt = $pdo->prepare("INSERT INTO abonnement (abonnement, prix) VALUES (:abonnement, :prix)");
// $stmt->bindParam(':abonnement', $_GET["abonnement"]);
// $stmt->bindParam(':prix', $_GET["prix"]);

// $stmt->execute();







// <form action="categorie_insert.php" method="GET">
//     <div>
//         <label for="categorie">Categorie (libelle) :</label>
//         <input type="text" id="categorie" name="categorie">
//     </div>
//     <input type="submit" value="Submit" />
// </form>








