<?php 

$login = "root";
$pass = "";
$host = "localhost";
$db = "baby_name";
$dbh = "mysql:host=$host;dbname=$db;charset=utf8";
$pdo = new PDO($dbh, $login, $pass);
