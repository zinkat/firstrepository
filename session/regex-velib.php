<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

$pdo = new PDO ('mysql: host=127.0.0.1; dbname=velib' , 'root', 'root');

// $stmt = $pdo->prepare("SELECT*FROM abonne LIMIT 25"); 
// $stmt->execute();

// $result = $stmt->fetchAll();
// print_r($result);













?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="regex-velib.php" method="get">
    <div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom">
    </div>

    <div>
        <label for="tel">Tel :</label>
        <input type="tel" id="tel" name="tel"></input>
    </div>

    <input type="submit" value="submit">



</form>
    
</body>
</html>



