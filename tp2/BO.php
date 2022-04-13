<?php
include_once("_includes.php");
// Après une connexion réussi l'adminstrateur arrive sur cette page


// Pour accéder à la base de données
    $db = new DB();
    $pdo = $db->getDB();
    $stmt = $pdo->prepare("SELECT * FROM abonne LIMIT 25");
    $stmt->execute();
// Vous pouvez ajouter un thème si vous voulez rendre l'interface plus jolie, mais vous ne serez pas évalué dessus

?>

<h1>Back Office - Vélib</h1>
<h3>Sélectionner une rubrique pour continuer</h3>

<table>
    <tr>
    <th>
        <a href="classes/abonne.php">
            <img src="images/bo/abonne.jpg" width="275" height="275"><br/>
            Abonné
            <!--
                Sur abonne.php, il va falloir créer une page comme celle-ci, avec :
                    - Consulter la liste des abonnés qui redirige vers abonnes.php
                        - Depuis abonnes.php pouvoir modifier un abonné ou le supprimer
                        - Modifier redirige vers abonne_modifier.php
                        - Supprimer redirige vers abonne_supprimer.php
                    Rechercher un abonne : abonne_rechercher_formulaire.php qui donne le resultat sur abonne_rechercher.php // Requête SQL, opérateur LIKE
                    - Ajouter un abonne qui redirige vers abonne_ajouter.php
                    - Modifier un abonné qui redirige vers abonne_modifier_formulaire.php, puis résultat sur abonne_modifier.php
                    - Supprimer un abonné qui redirige vers abonne_supprimer_formulaire.php puis suppression sur abonne_supprimer.php
                    - Détail d'un abonné qui redirige vers abonne_detail_formulaire.php, puis résultat sur abonne_detail.php
                a. Liste des abonnées (limiter aux 250° abonnés), afficher les 25°
                b. Ajout d'un abonné
                c. Modification d'un abonné
                d. Suppression d'un abonné
                e. Détail d'un abonné 
            -->
        </a>
    </th>
    <th>
        <a href="classes/abonnement.php">
        <img src="images/bo/abonnement_william-felker.jpg" width="275" height="275"><br/>
            Abonnement
            
        </a>
    </th>
    <th>
        <a href="location.php">
            <img src="images/bo/location_dylan-mullins.jpg" width="275" height="275"><br/>
            Location
            <!-- Même logique qu'un abonne -->
        </a>
    </th>
    </tr>
    <tr>
    <th>
        <a href="station.php">
            <img src="images/bo/station_carl-campbell-mlczexka.jpg" width="275" height="275"><br/>
            Station
            <!--
                Créer une page station.php avec deux liens :
                    a. Afficher la liste des stations : stations.php (afficher toutes les stations)
                    b. modifier l'état d'une station
                        Ajouter la posibilité de fermer une station pour maintenance (attention, il faudra peut etre faire des modifications en BDD : ajouter un champ, ajouter une table + relation, autre ET réfléchir à comment l'implémenter) On ne prend pas en compte la gestion de la location : vérifier si la station est disponnible à la location
            -->
        </a>
    </th>
    <th>
        <a href="#">
            <img src="images/bo/velo_jean-baptiste-charrat.jpg" width="275" height="275"><br/>
            Vélo
        </a>
    </th>
    <th>
        <a href="reglages.php">
            <img src="images/bo/settings_ashim-d-silva.jpg" width="275" height="275"><br/>
            Réglages
            <!-- 
                Vous changerez la langue ici : FR ou UK/EN via un formulaire
            -->
        </a>
    </th>
    </tr>
</table> 






