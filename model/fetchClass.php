<?php 
require_once("sql/connectToDB.php");
require_once("class/user.php");


function fetchUserClass($pdo,$userID){
$sql = "SELECT class_id FROM users WHERE id = :userID";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':userID', $userID);
$stmt->execute();
$results = $stmt->fetchColumn();
return $results;
}