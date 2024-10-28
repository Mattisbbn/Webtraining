<?php
require_once("config.php");
$pdo = connectToDb(DB_HOST, DB_NAME, DB_USER, DB_PASS);

function connectToDb($host, $db, $user, $pass){
    $pdo = new PDO('mysql:host=' . $host . '; port=3306; dbname=' . $db, $user, $pass);
    return $pdo;
}



function fetchAllDb($pdo, $table){ 
    $sql = "SELECT * FROM {$table}";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
}

function fetchUserType($pdo,$userType){
    $sql = "SELECT * FROM users WHERE role = :userType";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userType', $userType);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
}
