<?php
require_once("sql/connectToDB.php");
require_once('class/user.php');


if(isset($_POST["user_type"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $user_type = $_POST["user_type"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    logUser($pdo,$user_type,$email,$password);
}

if(isset($_POST["log-out"])){
    logout();
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
            $currentUser->setId($row[0]);
            $currentUser->setEmail($row[2]);
            $currentUser->setUsername($row[1]);
            $currentUser->setUserType($user_type); 
            session_start();
            $_SESSION['currentUser'] = $currentUser;
            header('Location: ?home');
            exit;
        }
    }
}

function logout() {
    session_start();
    session_unset();
    session_destroy(); 
    header("Location: ?login_page");
    exit;
}

