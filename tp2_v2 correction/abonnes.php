<?php
include_once("_includes.php");
// Après une connexion réussi l'adminstrateur arrive sur cette page


// Pour accéder à la base de données
$db = new DB();
$pdo = $db->getDB();
$stmt = $pdo->prepare("SELECT * 
                        FROM abonne 
                        INNER JOIN abonnement ON abonne.idabonnement = abonnement.idabonnement 
                        ORDER BY idabonne 
                        LIMIT 25");
$stmt->execute();



?>

<h1>Back Office - Vélib</h1>
<h2>><?php echo ucfirst(LANGUE["abonne_liste"]); ?></h2>

<?php
    $tableau = "<table>";
    $tableau.= "<tr>";
    $tableau.= "<th>id abonne</th>";
    $tableau.= "<th>".ucfirst(LANGUE["prenom"])."</th>";
    $tableau.= "<th>".ucfirst(LANGUE["nom"])."</th>";
    $tableau.= "<th>".ucfirst(LANGUE["abonnement"])."</th>";
    $tableau.= "<th>".ucfirst(LANGUE["modifier"])."</th>";
    $tableau.= "<th>".ucfirst(LANGUE["supprimer"])."</th>";
    $tableau.= "</tr>";
    
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
    
?>

