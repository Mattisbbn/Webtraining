<?php
class signaturesModel{

    private object $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

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

    public function startCall(int $scheduleId,array $presentsStudents){
       $this->createSignatures($scheduleId,$presentsStudents);
       $this->setCallStatus($scheduleId,"started");
    }

    public function endCall(int $scheduleId){
        $this->setCallStatus($scheduleId, "finished");
    }

    private function createSignatures(int $scheduleId,array $presentsStudents){
        $sql = "INSERT INTO signatures (user_id,schedule_id) VALUES (:userId , :scheduleId)";
        $stmt = $this->pdo->prepare($sql);

        foreach($presentsStudents as $studentId){
            $stmt->bindParam(':scheduleId', $scheduleId);
            $stmt->bindParam(':userId', $studentId);
            $stmt->execute();
        }
    }

    private function setCallStatus(int $scheduleId, string $status){
        $sql = 'UPDATE `schedule` SET `call_status` = :status WHERE `id` = :scheduleID';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':scheduleID', $scheduleId);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
    }

    public function checkSignatures($studentId, $scheduleId){
        $sql = "SELECT signatures.file_name FROM signatures WHERE signatures.user_id = :studentId AND signatures.schedule_id = :scheduleId";
        $stmt = $this->pdo->prepare($sql); 
        $stmt->bindParam(':scheduleId', $scheduleId, PDO::PARAM_INT);
        $stmt->bindParam(':studentId', $studentId, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchColumn();

        if($results){
            return "Signé";
        }else{
            return "Pas signé";
        }
    }

}
