<?php

require_once("class.php");
include_once("sql/fetchAccounts.php");
session_start();
require_once("partials/head.php");





if(!isset($_GET['login_page'])){
    require_once("partials/header.php");
}

// require_once("sql/connectToDB.php");
?>

<body>
    <main>
        <?php
        if (!empty($_GET)) {
            foreach ($_GET as $key => $value) {
                if ($key == "login_page") {
                    $isLoginpage = true;
                    require_once("pages/{$key}/{$key}.php");
                } elseif (file_exists("pages/{$key}/{$key}.php")) {
                    $isLoginpage = false;
                    require_once("pages/{$key}/{$key}.php");
                } else {
                    $isLoginpage = false;
                    require_once("pages/home/home.php");
                }
            }
        } else {
            require_once("pages/home/home.php");
        }
        ?>
    </main>
</body>
<script src="script.js"></script>

</html>