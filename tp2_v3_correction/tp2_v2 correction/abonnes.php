<script type="text/javascript">
    function functionAjax(idabonne){
        // alert("function " + idabonne);
        // On créer un objet de type XMLHttpRequest
        let xhr = new XMLHttpRequest();
        // Il va intéroger la page test_ajax_server.php en GET
        xhr.open('GET', 'abonne_supprimer.php?idabonne='+idabonne);
        // On va récupérer le contenu / réponse après l'exécution de la page
        xhr.onreadystatechange = function () {
            const DONE = 4;
            const OK = 200;
            // La requête a été exécutée xhr.open('GET', 'test_ajax_server.php');
            if (xhr.readyState === DONE) {
                // Si la réponse est 200 donc un succès https://developer.mozilla.org/en-US/docs/Web/HTTP/Status
                if (xhr.status === OK) {
                    document.getElementById("result_"+idabonne).innerHTML = "supprimé";
                }
                else{
                    // en cas d'erreur on affiche le message d'erreur dans le div result
                    alert("erreur "+xhr.status);
                }
            }
        };
        // On envoie la requête
        xhr.send();
    }
</script>

<?php
include_once("_includes.php");
include_once("_check_admin.php");
// Après une connexion réussi l'adminstrateur arrive sur cette page


// Pour accéder à la base de données

if(!isset($_GET["limit"])){
    $_GET["limit"] = 0;
}

$db = new DB();
$pdo = $db->getDB();
$stmt = $pdo->prepare("SELECT * 
                        FROM abonne 
                        INNER JOIN abonnement ON abonne.idabonnement = abonnement.idabonnement 
                        ORDER BY idabonne 
                        LIMIT :limit_min, 25");
$stmt->bindParam(':limit_min', $_GET["limit"]);
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
        
        $tableau.= "<td id='result_".$row["idabonne"]."'>";
        $tableau.= "<button type='button' onclick='functionAjax(" . $row["idabonne"] . ")'>";
        $tableau.= ucfirst(LANGUE["supprimer"]);
        $tableau.= "</button>";

        // $tableau.= "<a href='abonne_supprimer.php?idabonne=".$row["idabonne"]."'>";
        // $tableau.= ucfirst(LANGUE["supprimer"]);
        // $tableau.= "</a>";
        $tableau.= "</td>";
        $tableau.= "</tr>";
    }
    $tableau.= "</table>";
    
    echo $tableau;
    
    // Pagination
    $stmtPagination = $pdo->prepare("SELECT count(*) as nb FROM abonne ");
    $stmtPagination->execute();
    $resultat = $stmtPagination->fetch();

    $limitMin = $_GET["limit"]-25;
    $limitMax = $_GET["limit"]+25;

    if($limitMin < 0){
        $limitMin = 0;
    }
    if($limitMax >= $resultat['nb']){
        $limitMax = $resultat['nb']-1;
    }
?>
<br/>
<a href='abonnes.php?limit=<?php echo $limitMin; ?>'>page précédente</a> ||| <a href='abonnes.php?limit=<?php echo $limitMax; ?>'>page suivante</a>