<?php

require_once("../../config.php");

$stmt = $pdo->prepare("DELETE FROM film WHERE idfilm = :idfilm");
$stmt->bindParam(':idfilm', $_GET["idfilm"]);
$stmt->execute();
?>