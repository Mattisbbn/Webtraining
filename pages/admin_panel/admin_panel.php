<?php
fetchAllDb($pdo, "classes");
require_once("sql/fetchAccounts.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<section id="panel_section">
    <div class="d-flex">
        <div class="col-1 container-fluid "></div>
        <div id="panel_container" class="mt-2 p-2 col-10 rounded-4">
            <h1 class="text-center mb-2 mt-2 rounded-4">Panel </h1>
        <?php 
            require_once("pages/admin_panel/class_panel.php"); 
            require_once("pages/admin_panel/accounts_panel.php");
        ?>
        </div>
       
    </div>
    <div class="col-1 container-fluid"></div>
</section>
<script src="pages/admin_panel/admin_panel.js"></script>

