<script type="text/javascript">
    function functionAjax(idabonne){
        // On créer un objet de type XMLHttpRequest
        let xhr = new XMLHttpRequest();
        // Il va intéroger la page test_ajax_server.php en GET
        xhr.open('GET', 'DELETE/exo3/abonne_delete.php?idabonne='+idabonne);
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
                    document.getElementById("result_").innerHTML = xhr.status;
                }
            }
        };
        // On envoie la requête
        xhr.send();
    }

    function detailAbonne(idabonne){
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'abonne.php?idabonne='+idabonne);
        xhr.onreadystatechange = function () {
            const DONE = 4;
            const OK = 200;
            if (xhr.readyState === DONE) {
                if (xhr.status === OK) {
                    document.getElementById("detail").innerHTML = xhr.responseText;
                }
                else{
                    document.getElementById("detail").innerHTML = xhr.status;
                }
            }
        };
        xhr.send();
    }
</script>

<div id="tableau">
<?php
require_once("config.php");
// Abonnés
$stmt = $pdo->prepare("SELECT *
                        FROM abonne
                            INNER JOIN abonnement ON abonne.idabonnement = abonnement.idabonnement
                        LIMIT 25");

$stmt->execute();

$tableau = "<table>";
$tableau.= "<tr>";
$tableau.= "<th>id abonne</th>";
$tableau.= "<th>Nom</th>";
$tableau.= "<th>Email</th>";
$tableau.= "<th>Abonnement</th>";
$tableau.= "<th>Modifier</th>";
$tableau.= "<th>Supprimer</th>";
$tableau.= "<th>Détail</th>";
$tableau.= "</tr>";

foreach($stmt->fetchAll() as $row){
    $tableau.= "<tr>";
    $tableau.= "<td>";
    $tableau.= $row["idabonne"];
    $tableau.= "</td>";
    $tableau.= "<td>".utf8_encode($row["nom"])."</td>";
    $tableau.= "<td>".$row["email"]."</td>";
    $tableau.= "<td>".$row["abonnement"]."</td>";
    
    $tableau.= "<td><a href='UPDATE/exo2/abonne_update.php?idabonne=".$row["idabonne"]."'>";
    $tableau.= "Modifier";
    $tableau.= "</a></td>";

    $tableau.= "<td id='result_".$row["idabonne"]."'>";
    $tableau.= "<button type='button' onclick='functionAjax(" . $row["idabonne"] . ")'>";
    $tableau.= "Supprimer";
    $tableau.= "</button>";
    $tableau.= "</td>";

    $tableau.= "<td>";
    $tableau.= "<button type='button' onclick='detailAbonne(" . $row["idabonne"] . ")'>";
    $tableau.= "Détail";
    $tableau.= "</button>";
    $tableau.= "</td>";

    $tableau.= "</tr>";
}
$tableau.= "</table>";

echo $tableau;

?>
</div>
<div id="detail"></div>