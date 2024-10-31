<?php
$currentUser = unserialize($_SESSION["currentUser"]);
$userType = $currentUser->getUserType();
require_once("class/user.php");

if ($userType == "student") {
    require_once("view/home/userViews/student.php");
}elseif($userType == "teacher"){
    require_once("view/home/userViews/teacher.php");
}elseif($userType == "admin"){
    require_once("view/home/userViews/admin.php");
}
?>

<div class="d-flex" id="home_hour">
    <p class=" text-white d-flex hour"></p>
</div>