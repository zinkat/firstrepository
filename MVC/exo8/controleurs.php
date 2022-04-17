<?php
include("modeles.php");

function accueil(){
    include("affichage_accueil.php");
}

function listeAbonnes(){
    $stmt = getListeAbonnes();
    include("affichage_abonnes.php");
}

function getAbonne($idAbonne){
    $stmt = getAbonneM($idAbonne);
    include("affichage_abonne.php");
}