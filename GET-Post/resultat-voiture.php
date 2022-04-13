<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);


echo $_POST["marque"]." ".$_POST["modele"]." ".$_POST["puissance"]." ".$_POST["permis"];

  $permis = $_POST["permis"];

switch ($permis) {

  case "moto":
    echo "🛵";
    break;
  case "voiture":
    echo "🚗";
    break;
  case "bus":
    echo "🚌";
    break;
    case "camion":
     echo "🚚";
     break;
  default:
    echo "permis non défini";
}

$personnes = [12,30,14,78,10,54,21,25,45,15];
 $personne = 20;
if ($personne < 18){
  echo 'mineur';
}
elseif ($personne >= 18) {
  echo 'majeur';

}

// <form action="result_vehicule.php" method="POST">
// <div>
// <label for="marque">Marque :</label>
// <input type="text" id="marque" name="marque">
// </div>
// <div>
// <label for="modele">Modele :</label>
// <input type="text" id="modele" name="modele">
// </div>
// <div>
// <label for="puissance">Puissance :</label>
// <input type="number" id="puissance" name="puissance">
// </div>
// <div>
// <label for="permis">Permis :</label>
// <select name="permis">
//     <option value="a">A - moto</option>
//     <option value="b">B - voiture</option>
//     <option value="c">C - camion</option>
//     <option value="d">D - bus</option>
// </select>
// </div>
// <input type="submit" value="Submit" />
// </form>



// <?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// echo "Marque : ".$_POST['marque'];
// echo "<br/>";

// echo "Modele : ".getModele($_POST['modele']);
// echo "<br/>";

// echo "Puissance : ".getPuissance($_POST['permis'], $_POST['puissance']);
// echo "<br/>";

// echo "Permis : ".getPermisEmoji($_POST['permis']);
// echo "<br/>";

// function getModele($modele){
// if($modele == "formule 1" OR $modele == "F1"){
// $modele = "🏎️";
// }
// return $modele;
// }

// function getPuissance($permis, $puissance){
// if($permis == "b" && $puissance <= 1){
// $puissance = "🐌";
// }
// else{
// $puissance = $puissance . " ch";
// }
// return $puissance;
// }

// function getPermisEmoji($permis){
// $emoji = null;

// switch ($permis){
// case "a":
//     $emoji =  "🏍️";
//     break;
// case "b":
//     $emoji =  "🚗";
//     break;
// case "c":
//     $emoji =  "🚚";
//     break;
// case "d":
//     $emoji = "🚌";
//     break;
// }

// return $emoji;
// }
