<?php
require_once("../../config.php");

$stmt = $pdo->prepare("SELECT * FROM categorie");
$stmt->execute();

?>

<form action="film_insert.php" method="GET">
    <div>
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre">
    </div>
    <div>
        <label for="duree">Durée :</label>
        <input type="number" id="duree" name="duree">
    </div>
    <div>
        <label for="idcategorie">Categorie :</label>
        <select name="idcategorie">
        <?php
            $liste = "";
            foreach($stmt->fetchAll() as $row){
                $liste .= "<option value='".$row['idcategorie']."'>";
                $liste .= $row['categorie'];
                $liste .= "</option>";
            }
            echo $liste;
        ?>
        </select>
    </div>
    <input type="submit" value="Submit" />
</form>