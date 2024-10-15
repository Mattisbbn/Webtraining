<?php
require_once("sql/fetchAccounts.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION["currentUser"])) {
    $currentUser = $_SESSION["currentUser"];
} else {
    header('Location: ?login_page');
}

?>

<section id="settings_section">


    <div class="d-flex ">

        <div class="col-1 container-fluid "></div>

        <div id="settings_container" class="mt-2 p-2 col-10 rounded-4">
            <h1 class="text-center mb-2 mt-2 rounded-4">Settings</h1>
            <p class="settings_line p- rounded-4 ps-4">Utilisateur: <?php echo ($currentUser->getUsername()) ?></p>
            <p class="settings_line p- rounded-4 ps-4">Utilisateur: <?php echo ($currentUser->getId()) ?></p>
        </div>
        <div class="col-1 container-fluid"></div>
    </div>

</section>