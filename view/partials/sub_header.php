<div class="ps-2 pe-2  d-flex justify-content-between" id="sub_header">
    <a href="?admin_panel"><p>Pannel admin</p></a>
    <div class="d-flex">
    <a href=""><p><?php echo($currentUser->getUsername()) ?></p></a>
    <form method="post"><button name="log-out" type="submit"><i class="uil uil-signout text-white"></i></button></form>
    </div>
</div>

<?php 

// if($_SESSION["currentUser"]->getUserType() === "admin"){
//     echo("admin");
// }elseif($_SESSION["currentUser"]->getUserType() === "teacher"){
//     echo("teacher");
// }elseif($_SESSION["currentUser"]->getUserType() === "student"){
//     echo("student");
// }