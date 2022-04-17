<?php $title = "Accueil"; ?>
<?php ob_start(); ?>
<a href="index.php?route=abonnes">Liste des abonnées</a>
<?php $content = ob_get_clean(); ?>
<?php include("template.php"); ?>
