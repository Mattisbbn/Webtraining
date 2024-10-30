<?php
require_once("model/calendar.php");

?>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script>

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        slotMinTime: '08:00:00',
        slotMaxTime: '22:00:00',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: ''
        },
        locale: 'fr',
        views: {
            timeGrid: {
                duration: { days: 3 }, 
                slotDuration: '00:30:00',
                minTime: '08:00:00',
                maxTime: '18:00:00'
            },
            dayGrid: {
                duration: { days: 3 },
                minTime: '08:00:00',
                maxTime: '18:00:00'
            }
        },
        events: <?php echo fetchCalendar($pdo); ?>,
    });

    calendar.render();
});

    </script>
<div class="d-flex">  <div class="w-75 m-auto" id='calendar'></div></div>
  





<div class="d-flex" id="home_hour"><p class=" d-flex hour"></p></div>
<script src="view/home/home.js"></script>