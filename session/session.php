<?php
// page admin
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();


if($_SESSION['login'] == "admin"){
    echo "Accès au panel admin !";
}
else{
    echo "Vous devez êtes connecté !";
    sleep(2);
    header("Location: connexion.php");
}
