
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// $salaries = [
//     [
//         "identifiant" => 1,
//         "nom" => "Julien",
//         "telephone" => "07 87 10 06 49 00",
//         "job" => "Web Developer"
//     ],
//     [
//         "identifiant" => 2,
//         "nom" => "Alexandra",
//         "telephone" => "06 12  65 06 49 19",
//         "job" => "Python Developer"
//     ],
//     [
//         "identifiant" => 3,
//         "nom" => "Kumar",
//         "telephone" => "03 87 65 06 49 19",
//         "job" => "Laravel Developer"
//     ],
//     [
//         "identifiant" => 4,
//         "nom" => "Esmail",
//         "telephone" => "01 65 65 00 49 19",
//         "job" => "Synfony Developer"
//     ]
// ];



// $xml = "<?xml version='1.0' encoding='UTF-8'?>";
// $xml.="<entreprise>";
// foreach($salaries as $salarie){
//     // print_r($salarie);
//     // echo "<br/>";
//     // echo "<br/>";
//     $xml.="<salarie>";
//         $xml.="<identifiant>".$salarie["identifiant"]."</identifiant>";
//         $xml.="<nom>".$salarie["nom"]."</nom>";
//         $xml.="<telephone>".$salarie["telephone"]."</telephone>";
//         // $xml.="<job>".$salarie["job"]."</job>";
//         $xml.="<job>";
//             $xml.=$salarie["job"];
//         $xml.="</job>";
//     $xml.="</salarie>";   
// }
// // salarié n
// $xml.="</entreprise>";

// echo $xml;

$salaries = [
    [
        "identifiant" => 1,
        "nom" => "Julien",
        "telephone" => "07 87 10 06 49 00",
        "job" => "Web Developer"
    ],
    [
        "identifiant" => 2,
        "nom" => "Alexandra",
        "telephone" => "06 12  65 06 49 19",
        "job" => "Python Developer"
    ],
    [
        "identifiant" => 3,
        "nom" => "Kumar",
        "telephone" => "03 87 65 06 49 19",
        "job" => "Laravel Developer"
    ],
    [
        "identifiant" => 4,
        "nom" => "Esmail",
        "telephone" => "01 65 65 00 49 19",
        "job" => "Synfony Developer"
    ]
];


$eleves = [
    [
        "identifiant" => 1,
        "nom" => "Julien",
        "note" => "12",
        "matiere" => "math"
    ],
    [
        "identifiant" => 2,
        "nom" => "Alexandra",
        "note" => "10",
        "matiere" => "physique"
    ],
    [
        "identifiant" => 3,
        "nom" => "Kumar",
        "note" => "17",
        "matiere" => "philo"
    ],
    [
        "identifiant" => 4,
        "nom" => "Esmail",
        "note" => "14",
        "matiere" => "svt"
    ]
];


function arrayToXML($array, $topEntity, $clidEntity){
    $xml = "<?xml version='1.0' encoding='UTF-8'?>";
    $xml.="<".$topEntity.">";
    foreach($array as $element){
        $xml.="<".$clidEntity.">";
        foreach($element as $key => $value){
            $xml.="<".$key.">".$value."</".$key.">";
        }
        $xml.="</".$clidEntity.">";
    }
    $xml.="</".$topEntity.">";
    return $xml;
}

$stringXML = arrayToXML($salaries, "entreprise", "salarie");
// echo "<br/>";
// echo "<br/>";
// echo "<br/>";
// $stringXML = arrayToXML($eleves, "classe", "eleve");

$dom = new DOMDocument();
$dom->loadXML($stringXML);
$dom->save("salaries.xml");




