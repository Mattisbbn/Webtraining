<?php
class signaturesModel{

    private object $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function changeCallStatus(int $scheduleId,$callAction){
        $sql = 'UPDATE `schedule` SET `call_status` = :callAction WHERE `id` = :scheduleID';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':scheduleID', $scheduleId);
        $stmt->bindParam(':callAction', $callAction);
        $stmt->execute();
    }




    public function fetchUsersFromLesson($scheduleId){
        $sql = "SELECT users.username 
                FROM users 
                INNER JOIN schedule ON users.class_id = schedule.class_id 
                WHERE schedule.id = :scheduleId";
        
        $stmt = $this->pdo->prepare($sql); 
        $stmt->bindParam(':scheduleId', $scheduleId, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;}



}


