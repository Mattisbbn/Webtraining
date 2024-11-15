<?php 
require_once("controller/mainController.php");
require_once("controller/admin.php"); 
?>

<section class="d-flex">
    <?php require_once("view/partials/aside.php") ?> 
    <div id="accounts" class="m-auto admin-section white rounded-3 col-8 d-flex flex-column mt-4"><?php require_once("view/home/userViews/admin/partials/accounts.php")?></div>
    <div id="classes" class="m-auto admin-section white rounded-3 col-8 d-flex flex-column mt-4 d-none"><?php require_once("view/home/userViews/admin/partials/classes.php")?></div>
    <div id="subjects" class="m-auto admin-section white rounded-3 col-8 d-flex flex-column mt-4 d-none"><?php require_once("view/home/userViews/admin/partials/subjects.php")?></div>
    <div id="lessons" class="m-auto admin-section white rounded-3 col-8 d-flex flex-column mt-4 d-none"><?php require_once("view/home/userViews/admin/partials/lessons.php")?></div>
</section>

<script src="/webtraining/public/script/admin.js"></script>