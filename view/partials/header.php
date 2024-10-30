<?php
if (isset($_SESSION["currentUser"])) {
    $currentUser = $_SESSION["currentUser"];
} else {
    header('Location: ?login_page');
}
?>
<header class="p-2 d-flex align-center justify-content-between primary-color">
    <div class=" text-white text-center col-12">
       <a href="?"> <h1 class="mb-0 fw-bold">Webtraining</h1></a>
    </div>
</header>


<?php 
require_once("view/partials/sub_header.php");

