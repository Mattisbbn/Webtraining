<?php
require_once("sql/connectToDB.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once("controller/admin_panel_controller.php");
?>

<section id="panel_section">
    <div class="d-flex justify-content-center">
        <div id="panel_container" class="mt-2 p-2 col-10 rounded-4  ">
            <h1 class="text-center text-white mb-2 mt-2 rounded-4">Panel</h1>
        <?php 
        require_once("view/admin_panel/partials/accounts_panel.php"); 
        require_once("view/admin_panel/partials/lessons_panel.php");  
        ?>
        <div class="d-flex justify-content-center">
        
<div><?php require_once("view/admin_panel/partials/class_panel.php");  ?></div>
<div><?php require_once("view/admin_panel/partials/subject_panel.php");  ?></div>
  
        </div>
   
        </div>
       
    </div>
    <div class="col-1 container-fluid"></div>
</section>
<script src="view/admin_panel/admin_panel.js"></script>

