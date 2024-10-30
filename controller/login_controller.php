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
    foreach (getUserType($user_type,$pdo) as $row) {
        if ($row[2] === $email && password_verify($password, $row[3])) {
            $currentUser = new user();
         
            $currentUser->setEmail($row[2]);
            $currentUser->setUsername($row[1]);
            $currentUser->setUserType($user_type); 
            session_start();
            $_SESSION['currentUser'] = serialize($currentUser) ;
            header('Location: ?home');
            exit;
        }
    }
}