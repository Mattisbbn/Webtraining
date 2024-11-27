<?php
require_once("controller/database.php");
require_once("class/user.php");
require_once("model/login.php");

if(isset($_POST["user_type"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $user_type = $_POST["user_type"];
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    $loginController = new LoginController($pdo,$user_type,$email,$password);
    $loginController->logUser();
}

class LoginController{

    private $pdo;
    private $user_type;
    private $email;
    private $password;

    public function __construct($pdo,$user_type,$email,$password){
        $this->pdo = $pdo;
        $this->user_type = $user_type;
        $this->email = $email;
        $this->password = $password;
    }

    public function logUser(){
        $LoginModel = new LoginModel($this->pdo,$this->user_type,$this->email);
        $user = $LoginModel->fetchUser();
        
        if($user){ 
            $hashedPassword = $user["password"];
            if(password_verify($this->password, $hashedPassword)){
                $currentUser = new user();
            $currentUser->setuserID($user["id"]);
            $currentUser->setEmail($user["email"]);
            $currentUser->setUsername($user["username"]);
            $currentUser->setUserType($this->user_type); 
            $_SESSION['currentUser'] = serialize($currentUser) ;
            header('Location: ./');
            exit;
            }else{
                echo" Mot de passe incorrect.";
            }
        }else{
            echo("Aucun utilisateur trouvé avec cette adresse email.");
        }
    }
}
