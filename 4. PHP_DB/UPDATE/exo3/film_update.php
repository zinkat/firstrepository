<?php
require_once("../../config.php");

if(isset($_GET["titre"]) && isset($_GET["duree"]) && isset($_GET["idcategorie"])){
    $stmtUpdate = $pdo->prepare("UPDATE film SET 
                                titre = :titre, 
                                duree = :duree, 
                                idcategorie = :idcategorie 
                                WHERE idfilm = :idfilm");

    $stmtUpdate->bindParam(':titre', $_GET["titre"]);
    $stmtUpdate->bindParam(':duree', $_GET["duree"]);
    $stmtUpdate->bindParam(':idcategorie', $_GET["idcategorie"]);
    $stmtUpdate->bindParam(':idfilm', $_GET["idfilm"]);
    $stmtUpdate->execute();
}

// On récupère les informations du film pour l'affichage
$stmt = $pdo->prepare("SELECT * FROM film 
                            INNER JOIN categorie ON film.idcategorie = categorie.idcategorie 
                            WHERE idfilm = :idfilm");
$stmt->bindParam(':idfilm', $_GET["idfilm"]);
$stmt->execute();

$film = $stmt->fetch();

// On récupère la liste des categories pour le futur UPDATE
$stmtCategories = $pdo->prepare("SELECT * FROM categorie");
$stmtCategories->execute();

$categorie = $stmtCategories->fetch();

?>

<form action="film_update.php" method="GET">
    <div>
        <input type="hidden" name="idfilm" value="<?php echo $film['idfilm']; ?>"/>
        <label for="titre">Titre :</label>
        <input type="text" id="titre" name="titre" value="<?php echo $film['titre']; ?>">
    </div>
    <div>
        <label for="duree">Durée :</label>
        <input type="number" id="duree" name="duree" value="<?php echo $film['duree']; ?>">
    </div>
        
    <div>
        <br/>
        <label for="idcategorie">Categorie en cours : <i><?php echo $film["categorie"]; ?></i></label><br/>
        Changer de categorie ?<br/>
        <select name="idcategorie">
        <?php
            $liste = "";
            foreach($stmtCategories->fetchAll() as $row){
                $liste .= "<option ";
                    // ajout de la valeur
                    $liste .= "value='".$row['idcategorie']."'";
                    // vérification de la categorie  actuel et on le pré-sélectionne dans la liste déroulante
                    if($row['idcategorie'] == $film["idcategorie"]){
                        $liste .= " selected";
                    }
                $liste .= ">";
                $liste .= $row['categorie'];
                $liste .= "</option>";
            }
            echo $liste;
        ?>
        </select>
    </div>
    
    
    <input type="submit" value="Submit" />
</form>