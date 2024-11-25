<?php
require_once("controller/mainController.php");

function fetchClassCalendar($pdo,$classID) {
    $sql = "SELECT 
            schedule.id,
            subject.name, 
            schedule.start_datetime, 
            TIMESTAMPDIFF(HOUR, schedule.start_datetime, schedule.end_datetime) as lesson_duration
        FROM schedule
            LEFT JOIN subject ON subject.id = schedule.subject_id
        WHERE schedule.class_id = :class";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':class', $classID);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // $events = [];
    // foreach ($results as $row) {
    //     $events[] = [
    //         'title' =>  $row['name'],
    //         'start' => $row['start_datetime'],
    //         'end' => $row['end_datetime']
    //     ];
    // }
    // return json_encode($events);

    return $results;
}




function fetchLessonsStudents($pdo,$scheduleClassId){
    $sql = "SELECT users.username FROM users WHERE users.class_id = :scheduleClassId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':scheduleClassId', $scheduleClassId, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
return $results;
}
