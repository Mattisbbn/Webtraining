<?php
require_once("sql/connectToDB.php");
require_once("class/user.php");

if(isset($_POST["user_type"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $user_type = $_POST["user_type"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    logUser($pdo,$user_type,$email,$password);
}

function getUserType($user_type,$pdo){
    if($user_type == "student"){
        $results = fetchUserType($pdo,"student");
    }elseif($user_type == "teacher"){
        $results = fetchUserType($pdo,"teacher");
    }elseif($user_type == "admin"){
        $results = fetchUserType($pdo,"admin");
    }
    return $results;
}

function logUser($pdo,$user_type,$email,$password){
    foreach (getUserType($user_type,$pdo) as $user) {
        if ($user[2] === $email && password_verify($password, $user["password"])) {
            $currentUser = new user();
            $currentUser->setuserID($user["id"]);
            $currentUser->setEmail($user["email"]);
            $currentUser->setUsername($user["username"]);
            $currentUser->setUserType($user_type); 
            session_start();
            $_SESSION['currentUser'] = serialize($currentUser) ;
            header('Location: home');
            exit;
        }
    }
}
