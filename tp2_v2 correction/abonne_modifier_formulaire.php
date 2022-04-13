<?php
include_once("_includes.php");

$db = new DB();
$pdo = $db->getDB();

?>

<h1>Back Office - Vélib</h1>
<h2>><?php echo ucfirst(LANGUE["abonne_modifier"]); ?></h2>

<?php
    // Si un idabonne est présent, alors on complète les informations de l'abonné
    if(isset($_GET["idabonne"])){
        $stmt = $pdo->prepare("SELECT *
                        FROM abonne
                        INNER JOIN abonnement ON abonne.idabonnement = abonnement.idabonnement
                        WHERE idabonne = :idabonne");
        $stmt->bindParam(':idabonne', $_GET["idabonne"]);
        $stmt->execute();
        $resultat = $stmt->fetch();

        // On récupère la liste des abonnements
        $stmtAbonnement = $pdo->prepare("SELECT * FROM abonnement");
        $stmtAbonnement->execute();
        ?>
        <form action="abonne_modifier.php" method="GET">
            <div>
                <input type="hidden" id="idabonne" name="idabonne" value="<?php echo $resultat['idabonne']; ?>">
                <label for="nom"><?php echo ucfirst(LANGUE["nom"]); ?> :</label>
                <input type="text" id="nom" name="nom" value="<?php echo $resultat['nom']; ?>">
            </div>
            <div>
                <label for="prenom"><?php echo ucfirst(LANGUE["prenom"]); ?> :</label>
                <input type="text" id="prenom" name="prenom" value="<?php echo $resultat['prenom']; ?>">
            </div>
            <div>
                <label for="idabonnement"><?php echo ucfirst(LANGUE["abonnement"]); ?> :</label>
                <select name="idabonnement">
                <?php
                    $liste = "";
                    foreach($stmtAbonnement->fetchAll() as $row){
                        $liste .= "<option value='".$row['idabonnement']."'";
                        
                        // On sélectionne l'abonnement qui de l'abonné
                        if($resultat['idabonnement'] == $row["idabonnement"]){
                            $liste .= " selected";
                        }
                        $liste .= ">";

                        $liste .= $row['libelle']." | ".$row['prix']."€";
                        $liste .= "</option>";
                    }
                    echo $liste;
                ?>
                </select>
            </div>
            <input type="submit" value="Submit" />
        </form>
        <?php
    }
    // S'il n'y a d'idabonne selectionné, on affiche un formulaire pour saisir l'idabonne
    else{
        ?>
        <form action="abonne_modifier_formulaire.php" method="GET">
            <div>
                <label for="idabonne">idAbonne :</label>
                <input type="text" id="idabonne" name="idabonne">
            </div>
            
            <input type="submit" value="Submit" />
        </form>
        <?php
    }
?>