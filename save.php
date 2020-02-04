<?php
require_once "dbc.php";


try{
    $sql = "INSERT INTO rps (nickname, rounds, games, win, loss, equal, winer) 
    VALUES (:nickname, :rounds, :games, :win, :loss, :equal, :winer)";    

    $stmt = $pdo->prepare($sql);
    $games =  $_POST['win'] + $_POST['loss'] + $_POST['equal'];

    $stmt->bindParam(':nickname', $_POST['nickname']);
    $stmt->bindParam(':rounds', $_POST['rounds']);
    $stmt->bindParam(':games', $games);
    $stmt->bindParam(':win', $_POST['win']);
    $stmt->bindParam(':loss', $_POST['loss']);
    $stmt->bindParam(':equal', $_POST['equal']);
    $stmt->bindParam(':winer', $_POST['winer']);
    

    $stmt->execute();
} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}
 

unset($pdo);