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

function addNewClass($pdo, $class) {
    $sql = "INSERT INTO `classes` (`id`, `name`) VALUES (NULL, :class)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':class', $class);
    $stmt->execute();
}

function addNewSubject($pdo, $subject) {
    $sql = "INSERT INTO `subject` (`id`, `name`) VALUES (NULL, :subject)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':subject', $subject);
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

function fetchUser($pdo,$userType){
    $sql = "SELECT * FROM users WHERE role = :userType";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userType', $userType);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
}