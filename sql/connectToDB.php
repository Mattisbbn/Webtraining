<?php


function connectToDb($host, $db, $user, $pass){
    $pdo = new PDO('mysql:host=' . $host . '; port=3306; dbname=' . $db, $user, $pass);
    return $pdo;
}

$pdo = connectToDb('localhost', 'webtraining', 'mattis', '49610');

function fetchAllDb($pdo, $table){ 
    $sql = "SELECT * FROM {$table}";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
}

