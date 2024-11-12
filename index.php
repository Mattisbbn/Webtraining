<?php
session_start();
require_once("view/partials/head.php");

if(!isset($_GET['login'])){
    require_once("view/partials/header.php");
}


?>

<body>
    <main>
        <?php require_once("controller/router.php")?>
    </main>
</body>

</html>