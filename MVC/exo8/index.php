<?php
// On charge les controleurs pour les appeller par la suite
include_once("controleurs.php");

// Routeur
if(isset($_GET['route'])){
    // Routage : orienter vers le bon controleur
    switch($_GET['route']){
        case "abonnes":
            listeAbonnes();
            break;
        case "abonne":
            if(isset($_GET['idabonne'])){
                getAbonne($_GET['idabonne']);
            }
            else{
                echo "Saisir un GET idabonne";
            }
            break;
    }
}
else{
    // Si la route est inconnue, on suppose qu'il s'agit de l'acceuil
    accueil();
}