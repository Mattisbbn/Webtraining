<?php
require_once("controller/database.php");
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
        
        if($this->checkRecoveryStatus($token)){
        try{
            $sql = "UPDATE users SET password = :password WHERE email = :email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $this->changeRecoveryStatus($token);
            echo("<script>
            setTimeout(function(){
            window.location.href = 'login';
        }, 3000);
        </script>");

        echo("Le mot de passe à bien été changé, redirection dans 3 secondes");
        } catch(Exception $e){
            echo("Le mot de passe n'a pas été changé <br>");
            echo($e->getMessage());
        }
        }else{
            echo("le mot de passe à déja été changé");
        }
    }

    private function changeRecoveryStatus($token){
        $sql = "UPDATE recovery SET status = 'finished' WHERE token = :token";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
    }

    private function checkRecoveryStatus($token){
        $sql ="SELECT recovery.status FROM recovery WHERE token = :token";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
      
        if($stmt->fetchColumn() === "finished"){
            return false;
        }else{
            return true;
        }
    }
}

if(isset($_GET["token"])){
    $token = $_GET["token"];
    $changePasswordModel = new changePassword($pdo);
    $tokenAccount = $changePasswordModel->fetchRecoveryByToken($token);

    if($tokenAccount){
        require_once("view/changepassword/form/changepasswordform.php");
    }else{
        echo("Le token n'est pas valide");
    }
}

if(isset($_POST["new-password"])){
    $hashedPassword = password_hash($_POST["new-password"], PASSWORD_DEFAULT);
    $email = $tokenAccount['email'];
    $changePasswordModel->changePasswordByEmail($email,$hashedPassword,$token);
}