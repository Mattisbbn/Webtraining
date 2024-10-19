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

function deleteDbRow($pdo,$table,$rowId){
    $sql = "DELETE FROM $table WHERE id = $rowId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}

function addDbRowClasse($pdo, $class) {
    $sql = "INSERT INTO `classes` (`id`, `name`) VALUES (NULL, :class,);";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':class', $class);
    $stmt->execute();
}


function addNewUserOld($pdo,$table,$email,$password,$username){
$sql = "INSERT INTO $table (`id`, `email`, `password`, `username`) VALUES (NULL, :email, :password,:username)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
}

function addNewUser($pdo,$email,$password,$username,$role){
    $sql = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `class_id`, `role`) VALUES (NULL, :username, :email, :password,NULL,:role)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':role', $role);
    $stmt->execute();

}

