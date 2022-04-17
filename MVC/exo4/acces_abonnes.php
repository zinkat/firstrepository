<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pdo = new PDO('mysql:host=127.0.0.1;dbname=streaming', 'root', 'root');


// Abonnés
$stmt = $pdo->prepare("SELECT *
                        FROM abonne
                            INNER JOIN abonnement ON abonne.idabonnement = abonnement.idabonnement
                        LIMIT 25");

$stmt->execute();