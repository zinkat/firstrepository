<?php
ini_set("display_errors",1);
ini_set("display_startup_errors",1);
error_reporting(E_ALL);

$pdo = new PDO ('mysql: host=127.0.0.1; dbname=streaming' , 'root', 'root');