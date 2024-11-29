<?php

class teacherModel{

    private object $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function fetchTeacherCalendar($teacherID){
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
    
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':teacher', $teacherID);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $results;
    }
}

