<?php
$currentUser = unserialize($_SESSION["currentUser"]);
$userType = $currentUser->getUserType();
$userID = $currentUser->getUserId();
require_once("class/user.php");

if ($userType == "student") {
    require_once("view/home/userViews/student.php");
}elseif($userType == "teacher"){
    require_once("view/home/userViews/teacher/teacher.php");
}elseif($userType == "admin"){
    require_once("view/home/userViews/admin/admin.php");
}
?>

