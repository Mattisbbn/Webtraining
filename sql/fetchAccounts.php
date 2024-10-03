<?php
require_once("sql/fetchAccounts.php");


if(isset($_POST["user_type"]) && isset($_POST["email"]) && isset($_POST["password"])){


$user_type = $_POST["user_type"];
$email = $_POST["email"];
$password = $_POST["password"];



if($user_type === "teacher"){

    $results = fetchAllDb($pdo, "teacher_accounts");

    foreach($results as $row){
        echo($row[0].$row[1].$row[2]);
    }



}elseif($user_type === "student"){}



}