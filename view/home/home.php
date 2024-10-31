<?php
$currentUser = unserialize($_SESSION["currentUser"]);
$userType = $currentUser->getUserType();

if ($userType == "student") {
    require_once("view/home/userViews/student.php");
}elseif($userType == "teacher"){
    require_once("view/home/userViews/teacher.php");
}elseif($userType == "admin"){
    require_once("view/home/userViews/admin.php");
}















?>

<?php require_once("model/calendar.php"); ?>
<div class="d-flex" id="home_hour">
    <p class=" text-white d-flex hour"></p>
</div>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script>
    const events = <?php


                    echo fetchTeacherCalendar($pdo, $UserId);


                    // echo fetchStudentCalendar($pdo,$UserClassID)




                    ?>;
</script>
<?php
require_once("class/user.php");
require_once("model/fetchClass.php");

$userId = $currentUser->getUserID();
$UserClassID = fetchUserClass($pdo, $userId);
?>

<div class="d-flex rounded-3 border-0">
    <div class="col-10 m-auto rounded-3 border-0 " id='calendar'></div>
</div>

<script src="view/home/home.js"></script>