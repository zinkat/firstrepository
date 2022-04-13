<?php

require_once("../../config.php");

$stmtAbonne = $pdo->prepare("DELETE FROM abonne WHERE idabonne = :idabonne");
$stmtAbonne->bindParam(':idabonne', $_GET["idabonne"]);
$stmtAbonne->execute();

?>