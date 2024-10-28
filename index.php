<?php
include_once("sql/fetchAccounts.php");
session_start();
require_once("view/partials/head.php");

if(!isset($_GET['login_page'])){
    require_once("view/partials/header.php");
}
?>

<body>
    <main>
        <?php
    require_once("controller/router.php");
        ?>
    </main>
</body>
<script src="public/script/script.js"></script>

</html>