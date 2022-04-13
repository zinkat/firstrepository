<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

$ages =
 ['Zineb' => 40,
 'Julien' => 16,
 'Karim' => 45,
 'Rita' => 10,
 'David' => 99,
 'Samuel' => 78,
 'Marie' => 65,
 'Carole' => 35,
 'Eric' => 18,
 'Tommy' => 12,];

// foreach ($ages as $nom => $valuer){ 
//     if ($valuer < 18) {
//         echo 'nom=' .$nom. ', age =' . $valuer . ', vous etes mineur';
       
//     }  else {
//         echo 'nom=' .$nom. ', age =' . $valuer.  ', vous etes Majeur';
        
//     }
//     echo '<br>';
// }

// echo '<br>';

// // code optimisé

// foreach ($ages as $nom => $valuer){ 
//     echo 'nom=' .$nom. ', age =' . $valuer ;
//     if ($valuer < 18) {
//        echo ', vous etes mineur';
       
//     }  else {
//         echo  ', vous etes Majeur';
        
//     }
//     echo '<br>';
// } 


// //$maxage= max($ages);

foreach ($ages as $nom => $valuer){ 
    if ($valuer == max($ages)){ 
            echo $nom . ' a ' . $valuer;
    }


}
echo '<br>';
foreach ($ages as $nom => $valuer){ 
    if ($valuer == min($ages)){ 
            echo $nom . ' a ' . $valuer;
    }


}
 // methode remi
echo '<br>';

// Créer un tableau associatif
// $tableau = [‘Samuel’ => 30, ‘Julien’ => 28,];
// Faire une boucle afficher nom + age de la personne

$personnes = ["Samuel" => 30, "Julien" => 28,
            "Sarah" => 30, "Marine" => 40,
            "Zineb" => 15, "Mikael" => 28,
            "Mejdoub" => 75, "Esmail" => 28,
            "Alexandra" => 30, "Toto" => 17];
/*
foreach($personnes as $personne){
    1° tour de boucle la valeur de personne "Samuel" => 30
    2° tour de boucle la valeur de personne "Julien" => 28
    n fois
    10° tour de boucle la valeur de personne "Toto" => 17
}

for($i=0; $i<count($personnes); $i++){
    1° tour de boucle : $i = 0
    2° tour de boucle : $i = 1
    n fois
    10° tour de boucle : $i = 10
    
    $personnes[$i]
    $personnes[0] : "Samuel" => 30
    $personnes[1] : "Julien" => 28
    n fois
    $personnes[9] : "Toto" => 17
}
*/
foreach($personnes as $nom => $age){
    /*
    $personnes as $nom => $age
    1. On prend le tableau $personne
    2. Le as va prendre un élement du tableau (dans l'exemple 1° élément : Samuel et 30)
    3. $nom correspond à la clé, ici 1° élément "Samuel"
    4. $age correspond à la valeur de la clé, ici 1° élémenent 30
    */
    
    echo $nom." agée de ".$age." ans <br/>";
}

/////exo page 49

$ages = [12,20,45,2,99,78,65,35,18,12,18,17,21,39];
afficherSiMineurOuMajeurDepuis($ages);
// afficherSiMineurOuMajeurDepuis([12,20,45,2,99,78,65,35,18,12,18,17,21,39]);
// echo "Nb personnes majeures :". nbPersonnesMajeures($ages);

// echo "Le plus jeune a ".retournerLePlusPetit($ages);
// echo "Le plus grand a ".retournerLePlusGrand($ages);


function afficherSiMineurOuMajeurDepuis($ages){
    foreach($ages as $age){
        if($age < 18){
            echo "Mineur";
        }
        else{
            echo "<b>Majeur</b>";
        }
        echo "<br/>";
    }
}

/*
Créer une fonction qui compte le nombre de personnes majeures dans une liste
    Avant créer une deuxième fonction qui retourne true si la personne est majeure
    Et utiliser cette fonction dans la fonction « compte le nombre de personnes majeures
*/

echo nbMajeursDansLa($ages);

function nbMajeursDansLa($liste){
    $compteurNbMajeures = 0;

    foreach($liste as $age){
        if(estMajeure($age)){
            $compteurNbMajeures++;
        }
        // if($age >= 18){
        //     $compteurNbMajeures++;
        // }
    }

    return $compteurNbMajeures;
}
echo "<br/>";
function estMajeure($age){
    $majeur = false;
    
    if($age >= 18){
        $majeur = true;
    }
    return $majeur;
}

// Créer une fonction qui retourne l’age de la personne la plus jeune
// $ages
$ages = [12,20,45,2,99,78,65,35,18,12,18,17,21,39];
function retournerPlusJeune($ages){
    $agePlusPetit = $ages[0];

    foreach($ages as $age){
        if($agePlusPetit > $age){
            $agePlusPetit = $age;
        }
    }

    return $agePlusPetit;
}

echo retournerPlusJeune($ages);
// $agePlusPetit = 12

// On rentre dans la boucle
//     1: $agePlusPetit(12) > $age(12)
//     2: $agePlusPetit(12) > $age(20)
//     3: $agePlusPetit(12) > $age(45)
//     4: $agePlusPetit(12) > $age(2) 
//         On rentre dans le if
//         $agePlusPetit = 2
//     5: ...
//     Jusqu'à la fin

function retournerLePlusPetit($ages){
    $plusPetit = $ages[0];
    foreach($ages as $age){
        if($plusPetit > $age){
            $plusPetit = $age;
        }
    }
    return $plusPetit;
}

echo "<br/>";

function retournerLePlusGrand($ages){
    $plusGrand = $ages[0];
    foreach($ages as $age){
        if($plusGrand < $age){
            $plusGrand = $age;
        }
    }
    return $plusGrand;
}

echo "<br/>";

print_r(retournerPlusPetitEtPlusGrand($ages));

function retournerPlusPetitEtPlusGrand($ages){
    $plusPetit = retournerLePlusPetit($ages);
    $plusGrand = retournerLePlusGrand($ages);
    return array($plusPetit, $plusGrand);
}


///

$ingredients = array('oeuf', 'poisson', 'carotte',
                     'riz', 'thym', 'curcumin',
                     'pates', 'poivre', 'lait',
                     'sucre', 'farine', 'concombre');

$ingredients2 = array('oeuf', 'poisson', 'carotte',
                    'riz', 'thym', 'amande',
                    'pates', 'lactose', 'lait',
                    'sucre', 'farine', 'concombre');

$ingredients3 = array('oeuf', 'poisson', 'carotte',
                    'riz', 'thym', 'choufleur',
                    'pates', 'poivre', 'lait',
                    'sucre', 'farine', 'concombre');
  
 
                    $ingredientInterdit = "curcumin";

                    /* A function that takes two parameters. The first one is the name of the ingredient that we want to
                    check if it is in the list of ingredients. The second one is the list of ingredients. */
                    // echo "Liste 1: ".listeIngredientsConformes2($ingredientInterdit, $ingredients);
                    // echo "<br/>";
                    // echo "Liste 2: ".listeIngredientsConformes2($ingredientInterdit, $ingredients2);
                    // echo "<br/>";
                    // echo "Liste 3: ".listeIngredientsConformes2($ingredientInterdit, $ingredients3);
                    
                    
                    function listeIngredientsConformes($ingredients){
                        $listeConforme = true;
                    
                        foreach($ingredients as $ingredient){
                            if($ingredient == "curcumin"){
                                $listeConforme = false;
                            }
                        }
                        return $listeConforme;
                    }
                    
                    
                    // echo "Liste 1: ".verifierListeIngredientsOk($ingredients);
                    // echo "<br/>";
                    // echo "Liste 2: ".verifierListeIngredientsOk($ingredients2);
                    // echo "<br/>";
                    // echo "Liste 3: ".verifierListeIngredientsOk($ingredients3);
                    
                    function verifierListeIngredientsOk($ingredients){
                        $listeConforme = true;
                        $ingredientsInterdit = array("curcumin", "lactose", "amande");
                    
                        foreach($ingredientsInterdit as $ingredientInterdit){
                            if(listeIngredientsConformes2($ingredientInterdit, $ingredients) == false){
                                $listeConforme = false;
                            }
                        }
                        return $listeConforme;
                    }
                    
                    function listeIngredientsConformes2($ingredientInterdit, $ingredients){
                        $listeConforme = true;
                    
                        foreach($ingredients as $ingredient){
                            if($ingredient == $ingredientInterdit){
                                $listeConforme = false;
                            }
                        }
                        return $listeConforme;
                    }
                    
                    
                    
                    echo "Liste 1: ".listeIngredientsConformes3($ingredients);
                    echo "<br/>";
                    echo "Liste 2: ".listeIngredientsConformes3($ingredients2);
                    echo "<br/>";
                    echo "Liste 3: ".listeIngredientsConformes3($ingredients3);
                    
                    function listeIngredientsConformes3($ingredients){
                        $listeConforme = true;
                    
                        foreach($ingredients as $ingredient){
                            if($ingredient == "curcumin" OR $ingredient == "lactose" OR $ingredient == "amande"){
                                $listeConforme = false;
                            }
                        }
                        return $listeConforme;
                    }
                    echo "<br/>";
// Fonction surface d'un rectangle

function surfaceRectangle($longueur, $largeur) {
    $surface = $longueur * $largeur;

    return $surface;
}
                   
echo surfaceRectangle(30, 10); 

  echo "<br/>";

$date = date('d-m-y h:i:s');
echo $date;

// function initial nom prenom

function afficherInitiale2($nom){
    $initiale = $nom[0];
    $i=1;
    $trouveInitiale = false;
    while ($i <strlen($nom) AND $trouveInitiale == false){
        if($nom[$i] == " "){
          $initiale = $initiale.$nom[$i+1]; 
            $trouveInitiale = true;
            
        }
        echo $i. "<br>";
        $i++;
    }

    return $initiale;
}

echo afficherInitiale2("Benjamin Banoun");
echo "<br>" ;
echo afficherInitiale2("Sarah Zroud");

//2eme facon pour faire

echo afficherInitiale("Benjamin Banoun");
echo "<br>" ;
echo afficherInitiale("Sarah Zroud");


function afficherInitiale($nom){
    $nomExploded = explode(" ", $nom);

    print_r($nomExploded);
    $intiales = $nomExploded[0][0] . $nomExploded[1][0];

    return $intiales;
}

function afficherInitialeFin($nom){
    $nomExploded = explode(" ", $nom);

    print_r($nomExploded);
    $intiales = $nomExploded[0][-1] . $nomExploded[1][strlen($nomExploded[1])-1];
    //      1° caractère du PRENOM . 1° caractère du NOM

    return $intiales;
}

