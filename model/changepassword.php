<?php
class changePassword{

    private object $pdo;

    function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function fetchRecoveryByToken($token){
        $sql = "SELECT recovery.token,recovery.email FROM recovery WHERE recovery.token = :token";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function changePasswordByEmail($email,$hashedPassword,$token){
        $sql = "UPDATE users SET password = :password WHERE email = :email";
      
        try{
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $this->changeRecoveryStatus($token);
            echo("Le mot de passe à été changé avec succés");
        } catch(Exception $e){
            echo("Le mot de passe n'a pas été changé <br>");
            echo($e->getMessage());
        }
    }

    private function changeRecoveryStatus($token){
        $sql = "UPDATE recovery SET status = 'finished' WHERE token = :token";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
    }
}