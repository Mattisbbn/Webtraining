<?php
if (isset($_SESSION["currentUser"])) {
    $currentUser = $_SESSION["currentUser"];
} else {
    header('Location: ?login_page');
}
?>


<header class="p-2">
    <div class=" text-white text-center col-12">
       <a href="?"> <h1 class="mb-0 fw-bold">Webtraining</h1></a>
    </div>
  
</header>
<div class="ps-2 pe-2  d-flex justify-content-between" id="sub_header">
    <a href="?admin_panel"><p>Pannel admin</p></a>
    <div class="d-flex">
    <a href=""><p><?php echo($currentUser->getUsername()) ?></p></a>
    <form method="post"><button name="log-out" type="submit"><i class="uil uil-signout text-white"></i></button></form>
    </div>
   
   
</div>