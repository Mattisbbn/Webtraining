<?php
require_once("sql/connectToDB.php");
require_once('class.php');

if (isset($_POST["user_type"]) && isset($_POST["email"]) && isset($_POST["password"])) {

    $user_type = $_POST["user_type"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($user_type === "teacher") {
        $results = fetchAllDb($pdo, "teacher_accounts");
        foreach ($results as $row) {

            if ($row[1] === $email && $row[2] === $password) {
                $currentUser = new user();
                $currentUser->setId($row[0]);
                $currentUser->setEmail($row[1]);
                $currentUser->setUsername($row[3]);
                $currentUser->setUserType($row[4]);
                session_start();
                $_SESSION['currentUser'] = $currentUser;
                header('Location: ?home');
                exit;
            } else if($user_type === "admin"){

                $results = fetchAllDb($pdo, "admin_accounts");
                foreach ($results as $row) {
                    
                    if ($row[1] === $email && $row[2] === $password) 
                    $currentUser = new user();
                    $currentUser->setId($row[0]);
                    $currentUser->setEmail($row[1]);
                    $currentUser->setUsername($row[3]);
                    $currentUser->setUserType($row[4]);
                    session_start();
                    $_SESSION['currentUser'] = $currentUser;
                    header('Location: ?home');}
        
            } else{

                echo ("Non connecté");
            }
        }
        // elseif($user_type === "student"){}
    }
}
