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

function addDbRowClasse($pdo, $class, $numberofStudents) {
    $sql = "INSERT INTO `classes` (`id`, `name`, `studentsNumber`) VALUES (NULL, :class, :numberofStudents);";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':class', $class);
    $stmt->bindParam(':numberofStudents', $numberofStudents);
    $stmt->execute();
}
