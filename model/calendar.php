<?php
require_once("sql/connectToDB.php");

function fetchStudentCalendar($pdo,$classID) {
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


function fetchTeacherCalendar($pdo,$teacherID){
    $sql = "SELECT 
            schedule.id,
            subject.name, 
            schedule.start_datetime, 
            schedule.end_datetime,
            schedule.teacher_id,
            schedule.call_status,
            TIMESTAMPDIFF(HOUR, schedule.start_datetime, schedule.end_datetime) as lesson_duration,
            classes.name as class_name
        FROM schedule
            LEFT JOIN subject ON subject.id = schedule.subject_id
            LEFT JOIN classes ON classes.id = schedule.class_id
        WHERE schedule.teacher_id = :teacher";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':teacher', $teacherID);
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
    // // return json_encode($events);
    // return $events;

    return $results;
}