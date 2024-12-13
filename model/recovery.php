<?php 

class recoveryModel{

    private object $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }



// A faire 

    // private function checkRecoveryAvailiability($email, $date){
    //     $dateTime = date('Y-m-d H:i:s');

    //     $sql = 'SELECT recovery.email FROM recovery WHERE recovery.start_datetime BETWEEN :datetime - INTERVAL 15 MINUTE AND :datetime';

    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->bindParam(':datetime', $dateTime);
    // }


    public function addRecoveryToDb($email){
        $token = bin2hex(random_bytes(32));
        $dateTime = date('Y-m-d H:i:s');

        $sql = "INSERT INTO recovery (email, start_datetime, token) VALUES (:email, :start_datetime, :token)";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':start_datetime', $dateTime);
        $stmt->bindParam(':token', $token);

        $stmt->execute();
    }

}