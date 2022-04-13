<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();




//Si la personne a saisi 
if(isset($_GET['login']) && isset($_GET['mdp'])){
    if($_GET['login'] == "admin" && $_GET['mdp'] == "admin"){
        $_SESSION['login'] = "admin";
        echo "vous êtes connecté";
    }
    else{
        echo "Erreur dans la couple login/mdp";
    }
}


