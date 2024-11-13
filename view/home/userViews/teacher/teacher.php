<?php 
require_once("model/signatures.php");
require_once("model/calendar.php");
$userId = $currentUser->getUserID();
$teacherCalendar = fetchTeacherCalendar($pdo,$userId);
?>
<section class="d-flex">
<?php require_once("view/partials/aside.php") ?> 


<div class="white rounded-3 col-8 d-flex flex-column mt-4 m-auto "><?php require_once("view/home/userViews/teacher/partials/signatures.php"); ?></div>

</section>

