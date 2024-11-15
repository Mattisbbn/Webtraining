<?php
//Récuperer page actuelle
function getCurrentpage(){
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $url = str_replace('/webtraining/', '', $url);
    $segments = explode('/', $url);
    return $segments[0];
}

// Connection à la BDD
require_once("config.php");

$settings = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];

$pdo = connectToDb(DB_HOST, DB_NAME, DB_USER, DB_PASS,$settings);

function connectToDb($host, $db, $user, $pass,$settings ){
    $pdo = new PDO('mysql:host=' . $host . '; port=3306; dbname=' . $db, $user, $pass,$settings);
    return $pdo;
}

// A bouger 

function fetchAllDb($pdo, $table) {
    $sql = "SELECT * FROM $table";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
}


