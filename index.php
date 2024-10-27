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
        if (!empty($_GET)) {
            foreach ($_GET as $key => $value) {
                if ($key == "login_page") {
                    require_once("view/{$key}/{$key}.php");
                } elseif (file_exists("view/{$key}/{$key}.php")) {
                    require_once("view/{$key}/{$key}.php");
                } else {
                    require_once("view/home/home.php");
                }
            }
        } else {
            require_once("view/home/home.php");
        }
        ?>
    </main>
</body>
<script src="public/script/script.js"></script>

</html>