<script type="text/javascript">
    function functionAjax(){
        // On récupère les valeurs du formulaire
        // Récupérer le nom
        var abonnement = document.getElementById("abonnement").value;
        // Récupérer le prenom
        var prix = document.getElementById("prix").value;
        // Récupérer l'idabonnement

        
        // var url = 'abonne_ajouter_ajax.php?nom=' + nom + '&prenom=' + prenom + '&idabonnement=' + idabonnement;
        // On créer un objet de type XMLHttpRequest
        let xhr = new XMLHttpRequest();
        // Il va intéroger la page test_ajax_server.php en GET
        // xhr.open('GET', url);
        xhr.open('GET', 'abonnement_insert_1.php?abonnement=' + abonnement + '&prix=' + prix );
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form>
        <div>
            <label for="abonnement">Abonnement (libelle) :</label>
            <input type="text" id="abonnement" name="abonnement">
        </div>
        <div>
            <label for="prix">Prix :</label>
            <input type="number" id="prix" name="prix">
        </div>
        <div id="result">
        <input type="button" value="submit" onclick="functionAjax()"/>
        </div>
    </form>
    
</body>
</html>


