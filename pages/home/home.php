<?php 
require_once("sql/fetchAccounts.php");
if(isset($_SESSION["currentUser"])){
    $currentUser = $_SESSION["currentUser"];
}else{
    echo("Not logged in");
}
?>

<section id="home_section">
<div id="first_home_row">
<div id="home_schedule">
    <div class="schedule_container"></div>
    <div class="schedule_container"></div>
    <div class="schedule_container"></div>
    <div class="schedule_container"></div>
</div>

<div id="home_hour"><p class="hour"></p></div>

</div>

</section>

