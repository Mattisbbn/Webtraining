<?php 
require_once("sql/connectToDB.php");
require_once("controller/admin_panel_controller.php"); 
?>
<section class="d-flex">
<aside class="col-2 d-flex">
    <ul class="">
        <h5 class="ms-2 mb-3 mt-4 fw-bold">Admin</h5>
        <li class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500 active"><p><i class="uil uil-user"></i><a class="text-black" href="#accounts"> Comptes</a></p></li>
        <li class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500"><i class="uil uil-graduation-cap"></i> Classes</li>
        <li class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500"><i class="uil uil-layer-group"></i> Matières</li>
        <li class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500"><i class="uil uil-book-open"></i> Cours</li>
        <li class="p-2 mt-2 mb-2 rounded-3 navbuttons fw-500"><i class="uil uil-edit-alt"></i> Signatures</li>
    </ul>
</aside>

<div class="gray rounded-3 col-8 d-flex flex-column mt-4">
<?php require_once("view/admin/partials/accounts.php")?>
<?php require_once("view/admin/partials/class.php")?>
<?php require_once("view/admin/partials/lessons.php")?>
<?php require_once("view/admin/partials/subject.php")?>
</div>

</section>

<script src="public/script/admin_panel.js"></script>