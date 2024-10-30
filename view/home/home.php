<?php require_once("model/calendar.php");?>
<!-- <div class="d-flex" id="home_hour"><p class=" d-flex hour"></p></div> -->
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script>const events = <?php echo fetchCalendar($pdo)?>;</script>
 

<div class="d-flex">
    <div class="col-10 m-auto" id='calendar'></div>
</div>

<script src="view/home/home.js"></script>