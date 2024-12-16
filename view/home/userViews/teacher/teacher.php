<?php 
require_once("model/signatures.php");
require_once("model/calendar.php");
require_once("model/teacher.php");
$userId = $currentUser->getUserID();
$teacherModel = new teacherModel($pdo);

$signaturesModel = new signaturesModel($pdo);
?>
<section class="d-flex">
    <?php require_once("view/partials/aside.php") ?> 
    <div class="white rounded-3 col-8 d-flex flex-column mt-4 m-auto "><?php require_once("view/home/userViews/teacher/partials/signatures.php"); ?></div>
</section>