<?php
include_once("controleurs.php");

if(isset($_GET['route'])){

    switch($_GET['route']){

        case "abonnes":
            ListeAbonnes();
            break;
        case "abonne":
            if(isset($_GET['idabonne'])){
            getAbonne($_GET['idabonne']);
        }
        else  {
            echo "saisir un ID"; 
    }
    break;
}
}