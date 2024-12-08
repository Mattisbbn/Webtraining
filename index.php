<?php
session_start();
require_once("class/user.php");
require_once("view/partials/head.php");
require_once("controller/mainController.php");

$pageActions = new pageActions;
$currentPage = $pageActions->getCurrentpage();

if (isset($_SESSION["currentUser"]) && $currentPage != "login") {
    $currentUser = unserialize($_SESSION["currentUser"]);  
    if(empty($currentUser)){
        header('Location: login');
    }
}elseif($currentPage !== "login"){
    header('Location: login');
}

if($currentPage !== "login"){
    require_once("view/partials/header.php");
}
?>
<body>
    <main>
        <?php require_once("controller/router.php")?>
    </main>
</body>
</html>