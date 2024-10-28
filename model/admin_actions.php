<?php

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
function deleteDbRow($pdo,$table,$rowId){
    $sql = "DELETE FROM $table WHERE id = $rowId";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
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