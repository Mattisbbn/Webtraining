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

function deleteDbRow($pdo,$table,$rowId){
    $sql = "DELETE FROM $table WHERE id = $rowId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}



function fetchUserType($pdo,$userType){
    $sql = "SELECT * FROM users WHERE role = :userType";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userType', $userType);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
}

function fetchUsers($pdo) {
    $sql = "SELECT users.id, users.username, users.email, classes.name AS class_name, users.role FROM users
            LEFT JOIN classes ON users.class_id = classes.id"; 
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}


function changeClass($pdo,$user_id,$class_id){
    if ($class_id == "null") {
        $sql = "UPDATE `users` SET `class_id` = NULL WHERE `id` = :userId"; 
    }else{
        $sql = "UPDATE `users` SET `class_id` = :userClass WHERE `id` = :userId"; 
    }
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userId',$user_id);
    if ($class_id != "null") {
        $stmt->bindParam(':userClass', $class_id);
    }
    $stmt->execute();
}