<?php
include_once("_includes.php");

$db = new DB();
$pdo = $db->getDB();

?>

<h1>Back Office - Vélib</h1>
<h2>><?php echo ucfirst(LANGUE["abonne_ajout"]); ?></h2>

<?php
// Si on a les GET, alors on fait l'insertion
if(isset($_GET["nom"]) && isset($_GET["prenom"]) && isset($_GET["idabonnement"])){
    // On fait l'insert ici
    $stmt = $pdo->prepare("INSERT INTO abonne (nom, prenom, idabonnement) VALUES (:nom, :prenom, :idabonnement)");
    $stmt->bindParam(':nom', $_GET["nom"]);
    $stmt->bindParam(':prenom', $_GET["prenom"]);
    $stmt->bindParam(':idabonnement', $_GET["idabonnement"]);

    $stmt->execute();
}
// Si c'est la première fois qu'on arrive sur le site, on affiche le formulaire
else{
    $stmt = $pdo->prepare("SELECT * FROM abonnement");
    $stmt->execute();
?>
<form action="abonne_ajouter.php" method="GET">
    <div>
        <label for="nom"><?php echo ucfirst(LANGUE["nom"]); ?> :</label>
        <input type="text" id="nom" name="nom">
    </div>
    <div>
        <label for="prenom"><?php echo ucfirst(LANGUE["prenom"]); ?> :</label>
        <input type="text" id="prenom" name="prenom">
    </div>
    <div>
        <label for="idabonnement"><?php echo ucfirst(LANGUE["abonnement"]); ?> :</label>
        <select name="idabonnement">
        <?php
            $liste = "";
            foreach($stmt->fetchAll() as $row){
                $liste .= "<option value='".$row['idabonnement']."'>";
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
?>