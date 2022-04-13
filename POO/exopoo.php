<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

// require("personne.php");

// $personne = new personne("Smith" , "John");
// echo $personne -> getNom();
// echo "</br>" ;

// $personne -> setNom("S.");
// echo $personne -> getNom();

require("Logement.php");

$logement = new logement("1 place de l'égalité , paris", 120 , 4, 120000);
