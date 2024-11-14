<?php
require_once("class/user.php");
require_once("controller/logout.php");
require_once("controller/mainController.php");
$page = getCurrentpage();


if (isset($_SESSION["currentUser"])) {
    $currentUser = unserialize($_SESSION["currentUser"]);  
}elseif($page !== "login"){
    header('Location: login');
}

?>
<div class="ps-2 pe-2 d-flex justify-content-between" id="sub_header">
    <div class="d-flex">
    <p><?php echo($currentUser->getUsername()) ?></p>
    <form method="post"><button name="log-out" type="submit"><i class="uil uil-signout text-white"></i></button></form>
    </div>
</div>