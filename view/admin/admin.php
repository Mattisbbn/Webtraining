<?php 
require_once("sql/connectToDB.php");
require_once("controller/admin_panel_controller.php"); 
?>
<section class="d-flex">
    <?php require_once("view/partials/aside.php") ?> 

    <div id="accounts" class="admin-section white rounded-3 col-8 d-flex flex-column mt-4"><?php require_once("view/admin/partials/accounts.php")?></div>
    <div id="classes" class="admin-section white rounded-3 col-8 d-flex flex-column mt-4 d-none"><?php require_once("view/admin/partials/classes.php")?></div>
    <div id="lessons" class="admin-section white rounded-3 col-8 d-flex flex-column mt-4 d-none"><?php require_once("view/admin/partials/lessons.php")?></div>
    <div id="subjects" class="admin-section white rounded-3 col-8 d-flex flex-column mt-4 d-none"><?php require_once("view/admin/partials/subjects.php")?></div>
</section>

<script src="public/script/admin.js"></script>