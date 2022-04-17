<!-- <script type="text/javascript">
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
</script> -->

<div id="tableau">

<table>
<tr>
<th>id abonne</th>
<th>Nom</th>
<th>Email</th>
<th>Abonnement</th>

</tr>

<?php
$row = $stmt->fetch()?>
 <tr>
 <td> <?php echo $row["idabonne"];?> </td> 
 <td> <?php echo utf8_encode($row["nom"]);?></td>
 <td>  <?php echo $row["email"];?></td>
 <td><?php echo $row["abonnement"];?></td> 
    
 </tr>

</table>

</div>

<!-- <div id="detail"></div> -->