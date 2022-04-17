
<?php
// test_ajax_reponse.php
// This is the server-side script.

// Set the content type.
// header('Content-Type: text/plain');

// Send the data back.
echo "Hello";
?>

// test_ajax.php
<script type="text/javascript">
    function functionAjax(){
        // On créer un objet de type XMLHttpRequest
        let xhr = new XMLHttpRequest();
        // Il va intéroger la page test_ajax_server.php en GET
        xhr.open('GET', 'test_ajax_reponse.php');
        // On va récupérer le contenu / réponse après l'exécution de la page
        xhr.onreadystatechange = function () {
            const DONE = 4;
            const OK = 200;
            // La requête a été exécutée xhr.open('GET', 'test_ajax_server.php');
            if (xhr.readyState === DONE) {
                // Si la réponse est 200 donc un succès https://developer.mozilla.org/en-US/docs/Web/HTTP/Status
                if (xhr.status === OK) {
                    document.getElementById("result").innerHTML = xhr.responseText;
                }
                else{
                    // en cas d'erreur on affiche le message d'erreur dans le div result
                    document.getElementById("result").innerHTML = xhr.status;
                }
            }
        };
        // On envoie la requête
        xhr.send();
    }
</script>


<button type="button" onclick="functionAjax()">Bouton</button>
<div id="result"></div>


// abonnes.php
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





<?php
require_once("config.php");
// films
// $stmt = $pdo->prepare("SELECT * FROM film LIMIT 25");

// $stmt->execute();

// $tableau = "<table>";
// $tableau.= "<tr>";
// $tableau.= "<th>id Film</th>";
// $tableau.= "<th>Titre</th>";
// $tableau.= "<th>Durée</th>";
// $tableau.= "</tr>";

// foreach($stmt->fetchAll() as $row){
//     // print_r($row);
//     $tableau.= "<tr>";
//     $tableau.= "<td>".$row["idfilm"]."</td>";
//     $tableau.= "<td>".$row["titre"]."</td>";
//     $tableau.= "<td>".$row["duree"]."</td>";
//     $tableau.= "</tr>";
// }
// $tableau.= "</table>";

// echo $tableau;

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
$tableau.= "</tr>";

foreach($stmt->fetchAll() as $row){
    // print_r($row);
    $tableau.= "<tr>";
    $tableau.= "<td>";
        // $tableau.= "";
            $tableau.= $row["idabonne"];
        // $tableau.= "</a>";
    $tableau.= "</td>";
    $tableau.= "<td>".utf8_encode($row["nom"])."</td>";
    $tableau.= "<td>".$row["email"]."</td>";
    $tableau.= "<td>".$row["abonnement"]."</td>";
    
    $tableau.= "<td><a href='UPDATE/abonne_update.php?idabonne=".$row["idabonne"]."'>";
    $tableau.= "Modifier";
    $tableau.= "</a></td>";

    
    $tableau.= "<td>";
    $tableau.= "<a href='DELETE/abonne_delete.php?idabonne=".$row["idabonne"]."'>";
    $tableau.= "Supprimer";
    $tableau.= "</a></td>";
    $tableau.= "</tr>";
}
$tableau.= "</table>";

echo $tableau;









<script type="text/javascript">
    function functionAjax(){
        // On récupère les valeurs du formulaire
        // Récupérer le nom
        var nom = document.getElementById("nom").value;
        // Récupérer le prenom
        var prenom = document.getElementById("prenom").value;
        // Récupérer l'idabonnement
        var idabonnement = document.getElementById("idabonnement").value;
        
        // var url = 'abonne_ajouter_ajax.php?nom=' + nom + '&prenom=' + prenom + '&idabonnement=' + idabonnement;
        // On créer un objet de type XMLHttpRequest
        let xhr = new XMLHttpRequest();
        // Il va intéroger la page test_ajax_server.php en GET
        // xhr.open('GET', url);
        xhr.open('GET', 'abonne_ajouter_ajax.php?nom=' + nom + '&prenom=' + prenom + '&idabonnement=' + idabonnement);
        // xhr.open('GET', 'abonne_ajouter_ajax.php?nom='+nom);
        // On va récupérer le contenu / réponse après l'exécution de la page
        xhr.onreadystatechange = function () {
            
        // alert("function");
            const DONE = 4;
            const OK = 200;
            // La requête a été exécutée xhr.open('GET', 'abonne_ajouter_ajax.php');
            if (xhr.readyState === DONE) {
                // Si la réponse est 200 donc un succès https://developer.mozilla.org/en-US/docs/Web/HTTP/Status
                if (xhr.status === OK) {
                    document.getElementById("result").innerHTML = xhr.responseText;
                }
                else{
                    // en cas d'erreur on affiche le message d'erreur dans le div result
                    document.getElementById("result").innerHTML = xhr.status;
                }
            }
        };
        // On envoie la requête
        xhr.send();
    }
</script>

<?php
// $page = "BO";
include_once("_includes.php");

$db = new DB();
$pdo = $db->getDB();

?>

<h1>Back Office - Vélib</h1>
<h2>><?php echo ucfirst(LANGUE["abonne_ajout"]); ?></h2>

<?php
    $stmt = $pdo->prepare("SELECT * FROM abonnement");
    $stmt->execute();
?>
<form>
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
        <select name="idabonnement" id="idabonnement">
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
    <div id="result">
        <button type="button" onclick="functionAjax()">Submit</button>
    </div>
</form>

// abonne_ajouter_ajax.php
<?php
include_once("_includes.php");

$db = new DB();
$pdo = $db->getDB();

if(isset($_GET["nom"]) && isset($_GET["prenom"]) && isset($_GET["idabonnement"])){
    // On fait l'insert ici
    $stmt = $pdo->prepare("INSERT INTO abonne (nom, prenom, idabonnement) VALUES (:nom, :prenom, :idabonnement)");
    $stmt->bindParam(':nom', $_GET["nom"]);
    $stmt->bindParam(':prenom', $_GET["prenom"]);
    $stmt->bindParam(':idabonnement', $_GET["idabonnement"]);

    $stmt->execute();
    echo "Abonné ajouté !";
}
else{
    echo "Merci de saisir des données !";
}






<?php

require_once("../../config.php");

// Ajouter un nouveau abonnement
$stmt = $pdo->prepare("INSERT INTO abonnement (abonnement, prix) VALUES (:abonnement, :prix)");
$stmt->bindParam(':abonnement', $_GET["abonnement"]);
$stmt->bindParam(':prix', $_GET["prix"]);

$stmt->execute();
echo "Insertion réalisée !";

<script type="text/javascript">
    function functionAjax(){
        var abonement = document.getElementById("abonnement").value;
        var prix = document.getElementById("prix").value;

        var str = "abonnement=" + abonement + "&prix=" + prix;
        // On créer un objet de type XMLHttpRequest
        let xhr = new XMLHttpRequest();
        // Il va intéroger la page test_ajax_server.php en GET
        xhr.open('GET', 'abonnement_insert.php?' + str);
        // On va récupérer le contenu / réponse après l'exécution de la page
        xhr.onreadystatechange = function () {
            const DONE = 4;
            const OK = 200;
            // La requête a été exécutée xhr.open('GET', 'test_ajax_server.php');
            if (xhr.readyState === DONE) {
                // Si la réponse est 200 donc un succès https://developer.mozilla.org/en-US/docs/Web/HTTP/Status
                if (xhr.status === OK) {
                    document.getElementById("result").innerHTML = xhr.responseText;
                }
                else{
                    // en cas d'erreur on affiche le message d'erreur dans le div result
                    document.getElementById("result").innerHTML = xhr.status;
                }
            }
        };
        // On envoie la requête
        xhr.send();
    }
</script>

<form>
    <div>
        <label for="abonnement">Abonnement (libelle) :</label>
        <input type="text" id="abonnement" name="abonnement">
    </div>
    <div>
        <label for="prix">Prix :</label>
        <input type="number" id="prix" name="prix">
    </div>
    <button type="button" onclick="functionAjax()">Insérer</button>
</form>
<div id="result"></div>






<?php
require_once("config.php");
// films
// $stmt = $pdo->prepare("SELECT * FROM film LIMIT 25");

// $stmt->execute();

// $tableau = "<table>";
// $tableau.= "<tr>";
// $tableau.= "<th>id Film</th>";
// $tableau.= "<th>Titre</th>";
// $tableau.= "<th>Durée</th>";
// $tableau.= "</tr>";

// foreach($stmt->fetchAll() as $row){
//     // print_r($row);
//     $tableau.= "<tr>";
//     $tableau.= "<td>".$row["idfilm"]."</td>";
//     $tableau.= "<td>".$row["titre"]."</td>";
//     $tableau.= "<td>".$row["duree"]."</td>";
//     $tableau.= "</tr>";
// }
// $tableau.= "</table>";

// echo $tableau;

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
$tableau.= "</tr>";

foreach($stmt->fetchAll() as $row){
    // print_r($row);
    $tableau.= "<tr>";
    $tableau.= "<td>";
        // $tableau.= "";
            $tableau.= $row["idabonne"];
        // $tableau.= "</a>";
    $tableau.= "</td>";
    $tableau.= "<td>".utf8_encode($row["nom"])."</td>";
    $tableau.= "<td>".$row["email"]."</td>";
    $tableau.= "<td>".$row["abonnement"]."</td>";
    
    $tableau.= "<td><a href='UPDATE/abonne_update.php?idabonne=".$row["idabonne"]."'>";
    $tableau.= "Modifier";
    $tableau.= "</a></td>";

    
    $tableau.= "<td>";
    $tableau.= "<a href='DELETE/abonne_delete.php?idabonne=".$row["idabonne"]."'>";
    $tableau.= "Supprimer";
    $tableau.= "</a></td>";
    $tableau.= "</tr>";
}
$tableau.= "</table>";

echo $tableau;









<?php

require_once("config.php");
// Affiche le détail d'un abonné avec son idabonne
// Idabonne
// Nom
// Email
// Abonnement : nom + prix
// Nombre de films
// Nombre de commentaire

if(isset($_GET['idabonne'])){
    // $idabonne = $_POST["idabonne"];
    $idabonne = $_GET["idabonne"];
    // On récupère les informations sur l'abonné
    $stmt = $pdo->prepare("SELECT * FROM abonne WHERE idabonne = :idabonne");
    $stmt->bindParam(':idabonne', $idabonne);
    $stmt->execute();

    // On récupère son historique de films
    $stmtFilms = $pdo->prepare("SELECT count(*) as nb FROM historiques WHERE idabonne = :idabonne");
    $stmtFilms->bindParam(':idabonne', $idabonne);
    $stmtFilms->execute();

    // On récupère ces commentaires (le nombre)
    $stmtCmts = $pdo->prepare("SELECT count(*) as nb FROM commentaires WHERE idabonne = :idabonne");
    $stmtCmts->bindParam(':idabonne', $idabonne);
    $stmtCmts->execute();

    foreach($stmt->fetch() as $key => $value){
        if(!is_numeric($key)){
            echo $key . " : " . $value;
            echo "<br/>";
        }
    }
    
    echo "<br/>";
    echo "Nb films : " . $stmtFilms->fetch()["nb"];
    echo "<br/>";
    echo "Nb commentaires : " . $stmtCmts->fetch()["nb"];

}
else{
    echo "Erreur : saisir un idabonné";
}















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
    
    $tableau.= "<td><a href='UPDATE/abonne_update.php?idabonne=".$row["idabonne"]."'>";
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



















