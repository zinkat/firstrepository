<?php
include_once("_includes.php");

function detectLogin($login){
    $typeConnection = null;

    // On détermine s'il s'agit d'un numéro de téléphone ou d'un nom
    $regex = "#^0[1-9]( [1-9]{2}){4}$#"; // cherche un numéro de téléphone au format 01 23 45 56 78

    if(preg_match($regex, $login) == 1){
        $typeConnection = "telepone";
    }
    // s'il ne s'agit pas d'un numéro de téléphone, on suppose qu'il s'agit d'un du nom utilisé comme login
    else{
        $typeConnection = "nom";
    }

    return $typeConnection;
}