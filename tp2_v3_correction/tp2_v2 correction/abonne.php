<?php
include_once("_includes.php");
include_once("_check_admin.php");


?>

<h1>Back Office - Vélib</h1>
<h2>><?php echo ucfirst(LANGUE["abonne"]); ?></h2>
<h3><?php echo ucfirst(LANGUE["bo_h3"]); ?></h3>


<table>
    <tr>
    <th>
        <a href="abonnes.php">
            <?php echo ucfirst(LANGUE["abonne_liste"]); ?>
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
        <a href="abonne_ajouter.php">
            <?php echo ucfirst(LANGUE["abonne_ajout"]); ?>
            <!-- 
    Rechercher un abonne : abonne_rechercher_formulaire.php qui donne le resultat sur abonne_rechercher.php // Requête SQL, opérateur LIKE
   - Supprimer un abonné qui redirige vers abonne_supprimer_formulaire.php puis suppression sur abonne_supprimer.php
    - Détail d'un abonné qui redirige vers abonne_detail_formulaire.php, puis résultat sur abonne_detail.php -->
        </a>
    </th>
    <th>
        <a href="abonne_modifier_formulaire.php">
       
            <?php echo ucfirst(LANGUE["abonne_modifier"]); ?>
        </a>
    </th>
    </tr>
    <tr>
    <th>
        <a href="abonne_supprimer_formulaire.php">
        
            <?php echo ucfirst(LANGUE["abonne_supprimer"]); ?>
        </a>
    </th>
    <th>
        <a href="abonne_detail_formulaire.php">
        
            <?php echo ucfirst(LANGUE["abonne_detail"]); ?>
        </a>
    </th>
    <th>
        <a href="abonne_recherche.php">
        
            <?php echo ucfirst(LANGUE["abonne_rechercher"]); ?>
        </a>
    </th>
    </tr>
</table> 