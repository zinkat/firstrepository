<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);
 

function addition2Prametres ($nombre1, $nombre2){

    $addition = $nombre1 + $nombre2;

    return $addition;
}


// 5. Créer une fonction qui vous retourne la moyenne d’une liste de nombre entrée en paramètre,
// retourne la moyenne
$liste = [12,20,45,2,99,78,65,35,18,12,18,17,21,39];

// print_r($liste);
// echo "<br/>";
// echo retourneMoyenne($liste);
$listeGeneree = genererListeAleatoire(300);
print_r($listeGeneree);
echo "<br/>";
echo retourneMoyenne($listeGeneree);



function retourneMoyenne($liste){
    $sommeDeListe = null;

    // for($i = 0; $i<count($liste); $i++){
    //     $sommeDeListe = $sommeDeListe + $liste[$i];
    // }

    foreach($liste as $nb){
        $sommeDeListe = $sommeDeListe + $nb;
        // $sommeDeListe += $nb;
        echo "nb: ".$nb." | ";
        echo "sommeDeListe: ".$sommeDeListe."<br/>";
    }
    
    $nbElements =  count($liste);

    $moyenne = round($sommeDeListe/$nbElements);

    return $moyenne;
}

function genererListeAleatoire($nbElements){
    $liste = array();

    for($i=0; $i<$nbElements; $i++){
        $nbRandom = rand(0,100);
        array_push($liste, $nbRandom);
    }

    return $liste;
}

echo "<br/>";




$phone = "06 12 25 35 42";
function numtostring($numtel){

    $telstring = strval($numtel);
    $resultat = '+33'. str_replace( ' ','',  $telstring);

    return $resultat;
}

 echo numtostring ($phone);

//  function numtostring($numtel){

//     return '+33'. str_replace( ' ','',  strval($numtel));

// }

//  echo numtostring ($phone);