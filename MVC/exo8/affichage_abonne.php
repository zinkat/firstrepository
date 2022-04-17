<?php // Vue abonne ?>
<?php $title = "Abonné"; ?>
<?php ob_start(); ?>
<?php $row = $stmt->fetch(); ?>

Idabonne : <?php echo $row["idabonne"]; ?> <br/>
Nom : <?php echo utf8_encode($row["nom"]); ?> <br/>
Email : <?php echo $row["email"]; ?> <br/>
Abonnement : <?php echo $row["abonnement"]; ?> <br/>

<?php $content = ob_get_clean(); ?>
<?php include("template.php"); ?>
