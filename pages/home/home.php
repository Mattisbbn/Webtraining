<?php 

require_once("sql/fetchAccounts.php");
session_start();

if(isset($_SESSION["currentUser"])){
    $currentUser = $_SESSION["currentUser"];
}else{
    echo("Not logged in");
}


?>



<h1><?php echo($currentUser->getUsername()) ?></h1>