<?php
require_once("sql/connectToDB.php");


function fetchCalendar($pdo,$classID) {
    $sql = "SELECT 
            subject.name, 
            schedule.start_datetime, 
            schedule.end_datetime
        FROM schedule
            LEFT JOIN subject ON subject.id = schedule.subject_id
        WHERE schedule.class_id = :class";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':class', $classID);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $events = [];
    foreach ($results as $row) {
        $events[] = [
            'title' =>  $row['name'],
            'start' => $row['start_datetime'],
            'end' => $row['end_datetime']
        ];
    }
    
    return json_encode($events);
}
