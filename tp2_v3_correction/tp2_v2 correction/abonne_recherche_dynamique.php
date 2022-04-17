
<?php
include_once("_includes.php");
include_once("_check_admin.php");

if(isset($_GET['recherche'])){
    $db = new DB();
    $pdo = $db->getDB();
    $stmt = $pdo->prepare("SELECT *
                            FROM abonne
                            INNER JOIN abonnement ON abonne.idabonnement = abonnement.idabonnement
                            WHERE nom LIKE CONCAT('%', :nom, '%') OR prenom LIKE CONCAT('%', :prenom, '%') 
                            ORDER BY prenom ASC 
                            ");
    $stmt->bindParam(':nom', $_GET["recherche"]);
    $stmt->bindParam(':prenom', $_GET["recherche"]);
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