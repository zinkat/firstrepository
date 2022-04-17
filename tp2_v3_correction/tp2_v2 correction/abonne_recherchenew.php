<script type="text/javascript">
    function functionAjax(){
        var recherche = document.getElementById("recherche").value;
        
        // Si le nombre de caractères est inférieur à 3, pour éviter de faire des recherches lourdes et longues, on n'appelle pas la page abonne_recherche_dynamique.php
        if (recherche.length < 4) {
            document.getElementById("resultats").innerHTML = "Saisir au moins trois caractères.";
        } else {
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'abonne_recherche_dynamique.php?recherche='+recherche);
            xhr.onreadystatechange = function () {
                const DONE = 4;
                const OK = 200;
                if (xhr.readyState === DONE) {
                    if (xhr.status === OK) {
                        document.getElementById("resultats").innerHTML = xhr.responseText;
                    }
                    else{
                        document.getElementById("resultats").innerHTML = xhr.status;
                    }
                }
            };
            xhr.send();   
        }
    }
</script>

<?php
include_once("_includes.php");
include_once("_check_admin.php");

?>

<h1>Back Office - Vélib</h1>
<h2>><?php echo ucfirst(LANGUE["abonne_rechercher"]); ?></h2>

<form>
    <div>
        <label for="recherche"><?php echo ucfirst(LANGUE["recherche"]); ?> :</label>
        <input type="text" id="recherche" name="recherche" oninput="functionAjax()">
    </div>
</form>
<div id="resultats"></div>
