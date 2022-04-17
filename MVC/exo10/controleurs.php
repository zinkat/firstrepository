<?php
include("modeles.php");

function accueil(){
    include("vues/accueil.php");
}

function listeAbonnes(){
    $stmt = getListeAbonnes();
    include("vues/abonnes.php");
}

function getAbonne($idAbonne){
    $stmt = getAbonneM($idAbonne);
    include("vues/abonne.php");
}