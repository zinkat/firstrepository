<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);


// echo "nombre1 : ".$_POST['nombre1'];
// echo "<br/>";

// echo "nombre2 : ".$_POST['nombre2'];
// echo "<br/>";

// echo "Operation :".$_POST['Operation'];
// echo "<br/>";

// switch ($operation =$_POST['Operation']) {
// case ($operation == "addition"):
//       echo $resultat = $_POST['nombre1'] + $_POST['nombre2'];
//     break;
// case ($operation == "soustraction"):
//       echo $resultat = $_POST['nombre1'] - $_POST['nombre2'];
//     break;

// case ($operation == "division"):
//       echo $resultat = $_POST['nombre1'] / $_POST['nombre2'];
//     break;
// case ($operation == "multiplication"):
//       echo $resultat = $_POST['nombre1'] * $_POST['nombre2'];
//     break;
//   }



  echo "marche : ".$_POST['marche'];
  echo "<br/>";

  $etoiles = ["*", "**", "***", "****",];
  $etoiles=.$_POST['marche'];

  foreach($_POST['marche'] as $etoiles){
    echo $etoiles;
}