<?php
if (isset($_SESSION["currentUser"])) {
    $currentUser = $_SESSION["currentUser"];
} else {
    header('Location: ?login_page');
}
?>


<header class="p-2">
    <div class=" text-white text-center col-12">
        <h1 class="mb-0 fw-bold">Webtraining</h1>
    </div>
    <div class="h-100" id="user_info">
        <?php echo ("<h4 class='mb-0' id='username'>". '<i id="user_icon" class="me-2 uil uil-user"   "></i>' . $currentUser->getUsername() . "</h4>") ?>

    </div>
</header>