<?php 
require_once("controller/database.php");

class recoveryModel{

    private object $pdo;
    private string $token;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    private function setToken($token){
        $this->token = $token;
    }

    public function getToken(){
        return $this->token;
    }


    private function getUserIdWithEmail($email){
        $sql = "SELECT users.id FROM users WHERE users.email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetchColumn();

        return $result;
    }


    public function addRecoveryToDb($email){
        if($this->accountExist($email)){

            if(!$this->checkRecoveryAvailiability($email)){
                echo("Il y a déja une tentative de récupération de mot de passe en cours. <br> Veuillez vérifier dans vos spams en cas de non-réception du mail");
                return false;
            }else{

                $userId = $this->getUserIdWithEmail($email);
                $token = bin2hex(random_bytes(32));
                $dateTime = date('Y-m-d H:i:s');


                $sql = "INSERT INTO recovery (email,user_id, start_datetime, token) VALUES (:email,:id , :start_datetime, :token)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':id', $userId);
                $stmt->bindParam(':start_datetime', $dateTime);
                $stmt->bindParam(':token', $token);
                $stmt->execute();
                $this->setToken($token);
                return true;
            }
        }else{
            echo("Il n'y a pas de compte avec cette email");
        }
    }

    private function checkRecoveryAvailiability($email){
        $dateTime = date('Y-m-d H:i:s');
        $sql = 'SELECT recovery.email 
        FROM recovery 
        WHERE recovery.start_datetime BETWEEN DATE_SUB(:datetime, INTERVAL 15 MINUTE) AND :datetime2
        AND recovery.email = :email';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':datetime', $dateTime);
        $stmt->bindParam(':datetime2', $dateTime);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return !empty($results) ? false : true;
    }

    private function accountExist($email){
        $sql = "SELECT users.email FROM users WHERE users.email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        return !empty($results) ? true : false;
    }
}

$recoveryModel = new recoveryModel($pdo);