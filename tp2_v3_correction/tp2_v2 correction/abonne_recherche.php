<?php
include_once("_includes.php");
include_once("_check_admin.php");
// 2 cas :
    // 1 formulaire de recherche
    // 2 résultat du formulaire de recherche

?>

<h1>Back Office - Vélib</h1>
<h2>><?php echo ucfirst(LANGUE["abonne_rechercher"]); ?></h2>

<form action="abonne_recherche.php" method="GET">
    <div>
        <label for="nom"><?php echo ucfirst(LANGUE["nom"]); ?> :</label>
        <input type="text" id="nom" name="nom">
    </div>
    <div>
        <label for="prenom"><?php echo ucfirst(LANGUE["prenom"]); ?> :</label>
        <input type="text" id="prenom" name="prenom">
    </div>

    <input type="submit" value="Submit" />
</form>
<?php
if(isset($_GET['prenom']) && isset($_GET['nom'])){
    $db = new DB();
    $pdo = $db->getDB();
    $stmt = $pdo->prepare("SELECT *
                            FROM abonne
                            INNER JOIN abonnement ON abonne.idabonnement = abonnement.idabonnement
                            WHERE nom LIKE CONCAT('%', :nom, '%') AND prenom LIKE CONCAT('%', :prenom, '%') ");
    $stmt->bindParam(':nom', $_GET["nom"]);
    $stmt->bindParam(':prenom', $_GET["prenom"]);
    $stmt->execute();

    $tableau="<table>";
    foreach($stmt->fetchAll() as $row){
        $tableau.= "<tr>";
        $tableau.= "<td>";
        $tableau.= "<a href='abonne_detail.php?idabonne=".$row["idabonne"]."'>";
            $tableau.= $row["idabonne"];
        $tableau.= "</a>";
        $tableau.= "</td>";
        
        $tableau.= "<td>".$row["prenom"]."</td>";
        
        $tableau.= "<td>".$row["nom"]."</td>";
        
        $tableau.= "<td>".$row["libelle"]."</td>";

        $tableau.= "<td>";
        $tableau.= "<a href='abonne_modifier_formulaire.php?idabonne=".$row["idabonne"]."'>";
        $tableau.= ucfirst(LANGUE["modifier"]);
        $tableau.= "</a>";
        $tableau.= "</td>";
        
        $tableau.= "<td>";
        $tableau.= "<a href='abonne_supprimer.php?idabonne=".$row["idabonne"]."'>";
        $tableau.= ucfirst(LANGUE["supprimer"]);
        $tableau.= "</a>";
        $tableau.= "</td>";
        $tableau.= "</tr>";
    }
    $tableau.= "</table>";
    
    echo $tableau;
}
?>