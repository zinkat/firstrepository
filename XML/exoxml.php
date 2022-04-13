<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

$xml = simplexml_load_file("fichierexo.xml") ;


// foreach($xml->children() as $child){
// print_r($child);
// echo "<br/>";
// }

// echo "<br/>";

foreach($xml->children() as $child){
    echo ($child);
    echo "<br/>";
    }


