<?php

$server_name = "localhost:3306";
$db_name = "openparks";
$db_username = "root";
$db_password = "";

$pdo = new PDO("mysql:host={$server_name};dbname={$db_name}", "{$db_username}", "{$db_password}");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


return $pdo;

?>