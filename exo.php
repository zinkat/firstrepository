<?php
// $Age=16;

// if ($Age < 18){
//   echo "mineur"};
//   else ($Age > 18)
//   {echo "majeur"};

  //1. Créer une variable "age" avec pour valeur 16
  //2. Créer une condition qui vérifie si la personne est majeure ou mineure
  //3. Exécuter le scipt
 // 4. Changer la valeur de la variable "age" par 18
 // 5. Exécuter le script. */



  $age = 16;

  if($age >= 18) {
     echo "Vous êtes majeure.";


  }
  if($age < 18) {
   echo "Vous êtes mineure."; 
}
// correction



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$age = 18;

if($age < 18){
    echo "Mineur";
}
else{
    echo "Majeur";
 
}
echo "<br/>----<br/>";

$i=0;
while ($i <= 10){
    echo "i vaut : " . $i;
    echo "<br/>";
    $i++;
}

echo "<br/>----<br/>";


for($i = 0; $i <= 10; $i++){
    echo "i vaut : " . $i . "<br/>";}

    
echo "<br/>----<br/>";

// ------------------------------
// Exo bonus
// a. créer un tableau ages avec 10 ages
// b. compter le nombre de mineurs et de majeurs

$ages = [12,20,45,2,99,78,65,35,18,12,18,17,21,39];

// foreach($ages as $age){
//     if($age < 18){
for($i=0; $i < count($ages); $i++){
    // $age = $ages[$i];
    echo "i : ".$i." ";
    // if($age < 18){
    if($ages[$i] < 18){
        echo "Mineur";
    }
    else{
        echo "<b>Majeur</b>";
    }
    echo "<br/>";
}

echo "-----";

foreach($ages as $age){
    if($age < 18){
        echo "Mineur";
    }
    else{
        echo "<b>Majeur</b>";
    }
    echo "<br/>";
}

$mineursNb = 0;
$majeursNb = 0;

foreach($ages as $age){
    if($age < 18){
        $mineursNb++;
    }
    else{
        $majeursNb++;
    }
}

echo "Nb mineurs : ".$mineursNb;

echo "<br/>";

echo "Nb majeurs : ".$majeursNb;

echo "<br/>";






