<?php
require_once("controller/mainController.php");
require_once("class/user.php");
require_once("model/login.php");

if(isset($_POST["user_type"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $user_type = $_POST["user_type"];
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    logUser($pdo,$user_type,$email,$password);
}

function logUser($pdo,$user_type,$email,$password){
    $user = fetchUser($pdo,$user_type,$email);
        if($user){ 
            $hashedPassword = $user["password"];
            if(password_verify($password, $hashedPassword)){
                $currentUser = new user();
            $currentUser->setuserID($user["id"]);
            $currentUser->setEmail($user["email"]);
            $currentUser->setUsername($user["username"]);
            $currentUser->setUserType($user_type); 
            session_start();
            $_SESSION['currentUser'] = serialize($currentUser) ;
            header('Location: home');
            exit;
            }else{
                echo" Mot de passe incorrect.";
            }
        }else{
            echo("Aucun utilisateur trouvé avec cette adresse email.");
        }
 }