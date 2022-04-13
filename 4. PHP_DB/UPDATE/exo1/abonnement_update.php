<?php
require_once("../../config.php");

// update
// après avoir cliqué sur le bouton validé du formulaire, nous avons le nom de l'abonnement + le prix à mettre à jour
if(isset($_GET["abonnement"]) && isset($_GET["prix"])){
    // nous allons les saisir en base de données
    $stmtUpdate = $pdo->prepare("UPDATE abonnement SET abonnement = :abonnement, prix = :prix WHERE idabonnement = :idabonnement");
    $stmtUpdate->bindParam(':idabonnement', $_GET["idabonnement"]);
    $stmtUpdate->bindParam(':abonnement', $_GET["abonnement"]);
    $stmtUpdate->bindParam(':prix', $_GET["prix"]);
    $stmtUpdate->execute();
}

// On récupère les informations à afficher
// On place la requête SELECT après l'update, pour récupérer les dernières informations (juste après la mise à jour ;-)
$stmt = $pdo->prepare("SELECT * FROM abonnement WHERE idabonnement = :idabonnement");
$stmt->bindParam(':idabonnement', $_GET["idabonnement"]);
$stmt->execute();

$abonnement = $stmt->fetch();

?>
<form action="abonnement_update.php" method="GET">
    <div>
        <input type="hidden" name="idabonnement" value="<?php echo $abonnement['idabonnement']; ?>"/>
        <label for="abonnement">Abonnement (libelle) :</label>
        <input type="text" id="abonnement" name="abonnement" value="<?php echo $abonnement['abonnement']; ?>">
    </div>
    <div>
        <label for="prix">Prix :</label>
        <input type="number" id="prix" name="prix" value="<?php echo $abonnement['prix']; ?>">
    </div>
    <input type="submit" value="Submit" />
</form>