<?php 
require_once("controller/student.php");
require_once("controller/database.php");
$calendarModel = new studentModel($pdo);


?>
<section class="d-flex">
    <?php require_once("view/partials/aside.php") ?> 
    <div id="calendar" class="m-auto admin-section white rounded-3 col-8 d-flex flex-column mt-4 pb-4"><?php require_once("view/home/userViews/student/partials/calendar.php")?></div>
</section>