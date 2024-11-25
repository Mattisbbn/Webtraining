<?php

require_once("controller/mainController.php");
$page = getCurrentpage();


if (isset($_SESSION["currentUser"])) {
    $currentUser = unserialize($_SESSION["currentUser"]);  
}elseif($page !== "login"){
    header('Location: login');
}

?>
