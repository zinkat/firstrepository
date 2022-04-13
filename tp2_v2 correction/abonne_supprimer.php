<?php
include_once("_includes.php");
$db = new DB();
$pdo = $db->getDB();

$stmt = $pdo->prepare("DELETE FROM abonne WHERE idabonne = :idabonne");
$stmt->bindParam(':idabonne', $_GET["idabonne"]);
$stmt->execute();
?>