<?php
include_once("sql/fetchAccounts.php");
session_start();
require_once("partials/head.php");

if(!isset($_GET['login_page'])){
    require_once("partials/header.php");
}
?>

<body>
    <main>
        <?php
        if (!empty($_GET)) {
            foreach ($_GET as $key => $value) {
                if ($key == "login_page") {
                    require_once("pages/{$key}/{$key}.php");
                } elseif (file_exists("pages/{$key}/{$key}.php")) {
                    require_once("pages/{$key}/{$key}.php");
                } else {
                    require_once("pages/home/home.php");
                }
            }
        } else {
            require_once("pages/home/home.php");
        }
        ?>
    </main>
</body>
<script src="public/script/script.js"></script>

</html>