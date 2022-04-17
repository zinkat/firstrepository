<?php
include_once("_includes.php");

// Ici, nous n'avons que la langue à modifier, donc on ne crée pas de panel comme pour BO.php


// Si $_GET["langue"] a une valeur, on rentre dans le if
if(isset($_GET["langue"])){
    // on crée le cookie
    if($_GET["langue"] == "EN"){
        setcookie("LANGUE", "EN", time()+3600);
    }
    else{
        setcookie("LANGUE", "FR", time()+3600);
    }
    header('Location: BO.php');
}
// S'il n'y a pas de GET langue, on affiche le formulaire
else{
?>
<form action="reglages.php" method="GET">
    <div>
        <label for="langue">Langue</label>
        <input type="text" id="langue" name="langue">
    </div>
    <input type="submit" value="Submit" />
</form>
<?php
}