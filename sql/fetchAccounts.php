<?php
require_once("sql/connectToDB.php");
require_once('class/user.php');





function logUser($pdo,$user_type,$email,$password){
   
    if($user_type == "student"){
        $results = fetchUser($pdo,"student");
    }elseif($user_type == "teacher"){
        $results = fetchUser($pdo,"teacher");
    }elseif($user_type == "admin"){
        $results = fetchUser($pdo,"admin");
    }

    foreach ($results as $row) {

        if ($row[2] === $email && $row[3] === $password) {
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

if (isset($_POST["user_type"]) && isset($_POST["email"]) && isset($_POST["password"])) {
$user_type = $_POST["user_type"];
$email = $_POST["email"];
$password = $_POST["password"];

logUser($pdo,$user_type,$email,$password);
}
