<?php
// if (!empty($_GET)) {
//     foreach ($_GET as $key => $value) {
//         if ($key == "login") {
//             require_once("view/{$key}/{$key}.php");
//         } elseif (file_exists("view/{$key}/{$key}.php")) {
//             require_once("view/{$key}/{$key}.php");
//         } else {
//             require_once("view/home/home.php");
//         }
//     }
// } else {
//     require_once("view/home/home.php");
// }
require_once("class/user.php");
require_once("controller/mainController.php");
$page = getCurrentpage() ?? 'home';
if (!empty($page) && file_exists("view/{$page}/{$page}.php")) {
    require_once("view/{$page}/{$page}.php");
} else {
    require_once("view/home/home.php");
}