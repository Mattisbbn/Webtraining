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