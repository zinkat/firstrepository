<?php
require_once("../config.php");

$stmtAbonnement = $pdo->prepare("SELECT * FROM abonnement");
$stmtAbonnement->execute();

$stmtAdresse = $pdo->prepare("SELECT * FROM adresse LIMIT 25");
$stmtAdresse->execute();

?>

<form action="abonne_insert.php" method="GET">
    <div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom">
    </div>
    <div>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email">
    </div>
    <div>
        <label for="idabonnement">Abonnement :</label>
        <select name="idabonnement">
        <?php
            $liste = "";
            foreach($stmtAbonnement->fetchAll() as $row){
                $liste .= "<option value='".$row['idabonnement']."'>";
                $liste .= $row['abonnement'] ." | ".$row['prix']."€";
                $liste .= "</option>";
            }
            echo $liste;
        ?>
        </select>
    </div>
    <div>
        <label for="idadresse">Adresse :</label>
        <select name="idadresse">
        <?php
            foreach($stmtAdresse->fetchAll() as $row){
                echo "<option value='".$row['idadresse']."'>";
                echo utf8_encode($row['pays'] .", ".$row['ville'] .", ".$row['codepostal'] .", ".$row['adresse']);
                echo "</option>";
            }
        ?>
        </select>
    </div>
    <input type="submit" value="Submit" />
</form>