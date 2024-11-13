<?php
if (!empty($_GET)) {
    foreach ($_GET as $key => $value) {
        if ($key == "login") {
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
