<?php
require_once("controller/database.php");

function fetchLessonsStudents($pdo,$scheduleClassId){
    $sql = "SELECT users.username FROM users WHERE users.class_id = :scheduleClassId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':scheduleClassId', $scheduleClassId, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
return $results;
}