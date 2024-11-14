<?php
require_once("controller/mainController.php");
$page = getCurrentpage() ?? 'home';
if (!empty($page) && file_exists("view/{$page}/{$page}.php")) {
    require_once("view/{$page}/{$page}.php");
} else {
    require_once("view/home/home.php");
}