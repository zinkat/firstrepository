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
