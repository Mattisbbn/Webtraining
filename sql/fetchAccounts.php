<?php
require_once("sql/connectToDB.php");
require_once('class.php');

function logUser($typeOfUser,$results, $email, $password)
{
    foreach ($results as $row) {

        if ($row[1] === $email && $row[2] === $password) {
            $currentUser = new user();
            $currentUser->setId($row[0]);
            $currentUser->setEmail($row[1]);
            $currentUser->setUsername($row[3]);
            $currentUser->setUserType($typeOfUser); 
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
    echo ($user_type);


    if ($user_type === "admin") {
        $results = fetchAllDb($pdo, "admin_accounts");
        logUser(0,$results, $email, $password);
    }elseif($user_type === "teacher") {
        $results = fetchAllDb($pdo, "teacher_accounts");
        logUser(1,$results, $email, $password);
    }elseif($user_type === "student") {
        $results = fetchAllDb($pdo, "teacher_accounts");
        logUser(2,$results, $email, $password);
    }
    
    
    
    
}
