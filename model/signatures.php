<?php
function fetchTeacherCalendar($pdo,$teacherID){
    $sql = "SELECT 
            schedule.id,
            subject.name, 
            schedule.start_datetime, 
            schedule.end_datetime,
            schedule.teacher_id,
            schedule.call_status,
            schedule.class_id,
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

    return $results;
}



function changeCallStatus($pdo, $scheduleId,$action) {
    
    if($action == "start"){
        $callAction = "started";
    }elseif($action == "finish"){
        $callAction = "finished";
    }elseif($action == "cancel"){
        $callAction = null;
    }

    $sql = 'UPDATE `schedule` SET `call_status` = :callAction WHERE `id` = :scheduleID';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':scheduleID', $scheduleId);
    $stmt->bindParam(':callAction', $callAction);
    $stmt->execute();
}




function fetchUsersFromLesson($pdo, $scheduleId) {
    $sql = "SELECT users.username 
            FROM users 
            INNER JOIN schedule ON users.class_id = schedule.class_id 
            WHERE schedule.id = :scheduleId";
    
    $stmt = $pdo->prepare($sql); 
    $stmt->bindParam(':scheduleId', $scheduleId, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results; };

