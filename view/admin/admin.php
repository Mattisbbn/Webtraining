<?php 
require_once("sql/connectToDB.php");
require_once("controller/admin_panel_controller.php"); 
?>
<section class="d-flex">
<aside class="col-2 d-flex">
    <ul>
        <h5 class="ms-2 mb-3 mt-4 fw-bold">Admin</h5>
        <li class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500 active"><i class="uil uil-user"></i> Comptes</li>
        <li class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500"><i class="uil uil-graduation-cap"></i> Classes</a></li>
        <li class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500"><i class="uil uil-layer-group"></i> Matières</a></li>
        <li class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500"><i class="uil uil-book-open"></i> Cours</li>
        <li class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500"><i class="uil uil-edit-alt"></i> Signatures</li>
    </ul>
</aside>

<div id="accounts" class="admin-section white rounded-3 col-8 d-flex flex-column mt-4"><?php require_once("view/admin/partials/accounts.php")?></div>
<div id="classes" class="admin-section white rounded-3 col-8 d-flex flex-column mt-4 d-none"><?php require_once("view/admin/partials/classes.php")?></div>
<div id="lessons" class="admin-section white rounded-3 col-8 d-flex flex-column mt-4 d-none"><?php require_once("view/admin/partials/lessons.php")?></div>
<div id="subjects" class="admin-section white rounded-3 col-8 d-flex flex-column mt-4 d-none"><?php require_once("view/admin/partials/subjects.php")?></div>

</section>

<script src="public/script/admin.js"></script>