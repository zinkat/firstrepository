<?php

function ListeAbonnes(){
    include("acces_abonnes.php");
    include("affichage_abonnes.php");
}

function getAbonne($idabonne){
    include("acces_abonne.php");
    include("affichage_abonne.php");
}