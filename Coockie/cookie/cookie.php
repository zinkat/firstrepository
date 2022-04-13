<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// if(isset($_COOKIE["CSS"])){
//     setcookie("CSS", "style1", time()+3600);
// }

// selon l'heure 18h 6h
$heureDebutThemeSombre = 18;
$heureFinThemeSombre = 6;

// $heureActuelle = date('H')+2;
$heureActuelle = 00;

if($heureActuelle > $heureFinThemeSombre && $heureActuelle < $heureDebutThemeSombre){
    // on affiche le thème clair
    setcookie("CSS", "style2", time()+3600);
}
else{
    // thème sombre
    setcookie("CSS", "style1", time()+3600);
}

$style = "style1.css";
if($_COOKIE["CSS"] == "style2"){
    $style = "style2.css";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Titre</title>
    <link rel="stylesheet" href="css/<?php echo $style; ?>">
</head>
<body>

<h1>This is a heading</h1>
<p>This is a paragraph.</p>

</body>
</html> 















