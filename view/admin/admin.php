<?php 
require_once("sql/connectToDB.php");
require_once("controller/admin_panel_controller.php"); 
?>
<section class="d-flex">
<aside class="col-2 d-flex">
    <div class="d-flex flex-column ps-4">
    <h5 class="ms-2 mb-3 mt-4 fw-bold">Admin</h5>
     <a href="#accounts" class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500 active"><i class="uil uil-user"></i> Comptes</a>
     <a href="#classes"class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500 "><i class="uil uil-graduation-cap"></i> Classes</a>
     <a href="#subjects"class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500 "><i class="uil uil-layer-group"></i> Matières</a>
     <a href="#lessons"class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500 "><i class="uil uil-book-open"></i> Cours</a>
     <a href="#"class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500 "><i class="uil uil-edit-alt"></i> Signatures</a>
    </div>
</aside>

<div id="accounts" class="admin-section white rounded-3 col-8 d-flex flex-column mt-4"><?php require_once("view/admin/partials/accounts.php")?></div>
<div id="classes" class="admin-section white rounded-3 col-8 d-flex flex-column mt-4 d-none"><?php require_once("view/admin/partials/classes.php")?></div>
<div id="lessons" class="admin-section white rounded-3 col-8 d-flex flex-column mt-4 d-none"><?php require_once("view/admin/partials/lessons.php")?></div>
<div id="subjects" class="admin-section white rounded-3 col-8 d-flex flex-column mt-4 d-none"><?php require_once("view/admin/partials/subjects.php")?></div>

</section>

<script src="public/script/admin.js"></script>