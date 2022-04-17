<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<button type="button" onclick="functionAjax()">Button</button>
<div id="result"></div>



<script type="text/javascript">
    function functionAjax(){
        // On créer un objet de type XMLHttpRequest
        let xhr = new XMLHttpRequest();
        // Il va intéroger la page test_ajax_server.php en GET
        xhr.open('GET', 'test-ajax-reponse.php');
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
</body>
</html>

