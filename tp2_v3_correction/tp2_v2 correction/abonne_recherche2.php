<?php
include_once("_includes.php");
// 2 cas :
    // 1 formulaire de recherche
    // 2 résultat du formulaire de recherche

?>

<h1>Back Office - Vélib</h1>
<h2>><?php echo ucfirst(LANGUE["abonne_rechercher"]); ?></h2>

<form action="abonne_recherche.php" method="GET">
    <div>
        <label for="recherche"><?php echo ucfirst(LANGUE["rechercher"]); ?> :</label>
        <input type="text" id="recherche" name="recherche">
    </div>

    <input type="submit" value="Submit" />
</form>
<?php
if(isset($_GET['recherche'])){
    $db = new DB();
    $pdo = $db->getDB();
    $stmt = $pdo->prepare("SELECT *
                            FROM abonne
                            INNER JOIN abonnement ON abonne.idabonnement = abonnement.idabonnement
                            WHERE nom LIKE CONCAT('%', :recherche1, '%') OR prenom LIKE CONCAT('%', :recherche2, '%') ");
    $stmt->bindParam(':recherche1', $_GET["recherche"]);
    $stmt->bindParam(':recherche2', $_GET["recherche"]);
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