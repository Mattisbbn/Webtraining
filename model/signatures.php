<?php
class signaturesModel{

    private object $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    
    // public function changeCallStatus(int $scheduleId,$callAction){
    //     $sql = 'UPDATE `schedule` SET `call_status` = :callAction WHERE `id` = :scheduleID';
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->bindParam(':scheduleID', $scheduleId);
    //     $stmt->bindParam(':callAction', $callAction);
    //     $stmt->execute();
    // }

    public function fetchUsersFromLesson($scheduleId){
        $sql = "SELECT users.username, users.id
                FROM users 
                INNER JOIN schedule ON users.class_id = schedule.class_id 
                WHERE schedule.id = :scheduleId";
        
        $stmt = $this->pdo->prepare($sql); 
        $stmt->bindParam(':scheduleId', $scheduleId, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }

    // public function startCall($scheduleId,$classId){
    //     $this->createSignatures($scheduleId,$classId);
    //     $this->changeClassStatus($scheduleId);
    // }

    // private function changeClassStatus(int $scheduleId){
    //     $sql = 'UPDATE `schedule` SET `call_status` = "started" WHERE `id` = :scheduleID';
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->bindParam(':scheduleID', $scheduleId);
    //     $stmt->execute();
    // }

    // private function createSignatures($scheduleId,$classId){

    //     $sql = "INSERT INTO signatures (user_id,schedule_id) 
    //     SELECT users.id, :schedule_id
    //     FROM users
    //     WHERE class_id = :class_id";

    //     $stmt = $this->pdo->prepare($sql); 
    //     $stmt->bindParam(':class_id', $classId, PDO::PARAM_INT);
    //     $stmt->bindParam(':schedule_id', $scheduleId, PDO::PARAM_INT);
    //     $stmt->execute();
    // }


    // public function checkSignatures($studentId, $scheduleId){
    //     $sql = "SELECT signatures.file_name FROM signatures WHERE signatures.user_id = :studentId AND signatures.schedule_id = :scheduleId";
    //     $stmt = $this->pdo->prepare($sql); 
    //     $stmt->bindParam(':scheduleId', $scheduleId, PDO::PARAM_INT);
    //     $stmt->bindParam(':studentId', $studentId, PDO::PARAM_INT);
    //     $stmt->execute();
    //     $results = $stmt->fetchColumn();

    //     if($results){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

    // public function startCall($studentIdList){
    //     $studentIdList = [12,32,23,24];





    // }



    // private function createSignatures(int $scheduleId,array $studentIdList){

    // }
}


