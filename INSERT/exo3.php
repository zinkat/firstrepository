<?php
require_once("./config.php");


$stmtcategorie = $pdo->prepare("SELECT * FROM film");
$stmtcategorie->execute();

?>

<form action="resultexo3.php" method="GET">
    <div>
        <label for="titre">titre :</label>
        <input type="titre" id="titre" name="titre">
    </div>
    <div>
        <label for="duree">Duree :</label>
        <input type="duree" id="duree" name="duree">
    </div>
    
    <div>
        <label for="idcategorie">catégorie :</label>
        <select name="idcategorie">
        <?php
            $liste = "";
            foreach($stmtfilm->fetchAll() as $row){
                $liste .= "<option value='".$row['idcategorie']."'>";
                $liste .= $row['catégorie'] ." | ".$row['categorie'];
                $liste .= "</option>";
            }
            echo $liste;
         ?>
         </select> 
      
    </div>
    <input type="submit" value="envoyer">
</form>