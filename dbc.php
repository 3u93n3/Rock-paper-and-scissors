<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "work_01";
$char = 'utf8mb4';
$opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
);

$dsn = "mysql:host=$host;dbname=$db;charset=$char";

try{
    $pdo = new PDO($dsn, $user, $pass, $opt);
}catch(PDOException $e){
    echo $e->getMessage();
}