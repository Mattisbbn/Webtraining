<?php

require_once("sql/fetchAccounts.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_POST['userName']) && isset($_POST['userEmail']) && isset($_POST['userPassword'])){
    addNewUser($pdo,$_POST['userEmail'],$_POST['userPassword'],$_POST['userName'],$_POST['userRole']);
    header("Refresh:0");
    exit();
}


function deleteRowFromPost($pdo,$rowToAffect,$postID){
    deleteDbRow($pdo, $rowToAffect, $postID);
    header("Refresh:0");
    exit();
}

if (isset($_POST["deleteStudent"])) {
    deleteRowFromPost($pdo,"student_accounts",$_POST["studentID"]);
}

if (isset($_POST["deleteTeacher"])) {
    deleteRowFromPost($pdo,"teacher_accounts",$_POST["teacherID"]);
}

if (isset($_POST["deleteAdmin"])) {
    deleteRowFromPost($pdo,"admin_accounts",$_POST["adminID"]);
}
?>

<section id="panel_section">
    <div class="d-flex">
        <div class="col-1 container-fluid "></div>
        <div id="panel_container" class="mt-2 p-2 col-10 rounded-4">
            <h1 class="text-center mb-2 mt-2 rounded-4">Panel </h1>
        <?php 
            // require_once("pages/admin_panel/class_panel.php"); 
            require_once("pages/admin_panel/accounts_panel.php");
        ?>
        </div>
       
    </div>
    <div class="col-1 container-fluid"></div>
</section>
<script src="pages/admin_panel/admin_panel.js"></script>

