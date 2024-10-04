<?php 


if(isset($_SESSION["currentUser"])){
    $currentUser = $_SESSION["currentUser"];
}else{
    header('Location: ?login_page');
}


?>



<header>
    <div id="header"><h1>Webtraining</h1></div>
    <div id="user_info">
    

<i class="uil uil-user"></i>

<?php
    
    echo("<h4 id='username'>".$currentUser->getUsername()."</h4>") ?> 
    </div>
</header>