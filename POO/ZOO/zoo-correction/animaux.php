<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("chien.php");
require("chat.php");


// $chien = new Chien(1, "chien", "Sirop", true);

// echo $chien->getNom();
// echo $chien->tour();
// aUneNiche($chien);


// $chien2 = new Chien(2, "chien", "Sam", false);
// aUneNiche($chien2);

// function aUneNiche($chien){
//     if($chien->getNiche() == true){
//         echo $chien->getNom() . " a une niche";
//     }
//     else{
//         echo $chien->getNom() . " demande une niche";
//     }
// }

$chat = new Chat(1, "chat", "Zoro", false);

// echo $chat->getIdentifiant();
// echo $chat->getEspece();


$chat->__toString();