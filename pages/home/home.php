<?php 

require_once("sql/fetchAccounts.php");
if(isset($_SESSION["currentUser"])){
    $currentUser = $_SESSION["currentUser"];
}else{
    echo("Not logged in");
}

?>
