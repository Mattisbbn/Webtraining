<?php
class changePasswordModel{

    private object $pdo;

    function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function fetchRecoveryByToken($token){
        $sql = "SELECT recovery.token,recovery.email FROM recovery WHERE recovery.token = :token";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        $result = $stmt->fetchColumn();
        return $result;
    }

    // public function changePasswordByToken(){

    // }
}