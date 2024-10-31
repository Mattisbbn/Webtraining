<?php require_once("model/calendar.php");?>
<div class="d-flex" id="home_hour"><p class=" text-white d-flex hour"></p></div>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

<?php 
require_once("class/user.php");
require_once("model/fetchClass.php");
$currentUser = unserialize($_SESSION["currentUser"]);
$userId = $currentUser->getUserID();
$UserClassID = fetchUserClass($pdo,$userId);
?>

<script>const events = <?php echo fetchCalendar($pdo,$UserClassID)?>;</script>
 
<div class="d-flex">
    <div class="col-10 m-auto" id='calendar'></div>
</div>

<script src="view/home/home.js"></script>

