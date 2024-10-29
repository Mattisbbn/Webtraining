<section d-flex>
<h1 class="text-center">Calendrier</h1>
<table>
<thead>
    <th class='third-color'>Heure</th>
    <th></th>
</thead>
<thead>
    <?php 
//    for ($i = 8; $i <= 17; $i++) {
//     echo("<tr><td class='third-color'><h4>" . sprintf("%02d:00", $i)."</h4></td>
//     <td>ff <td>
//     </tr>");
//     if($i < 24){
//         echo("<tr><td class='third-color'><h4>" . sprintf("%02d:30", $i)."</h4></td>");
//     }
// }
    ?>



<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
       
        var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGrid',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'timeGridWeek,dayGridMonth'
                },
                locale: 'fr', // Définir la locale sur français
                views: {
                    timeGrid: {
                        duration: { days: 3 },
                        slotDuration: '00:30:00', // Durée de chaque slot de 30 minutes
                        minTime: '08:00:00', // Heure minimale

                     
                    }
                },
                events: [
                    { title: 'Événement 1', start: '2024-10-29T10:00:00', end: '2024-10-29T12:00:00' },
                    { title: 'Événement 2', start: '2024-10-30T09:00:00', end: '2024-10-30T10:30:00' },
                    { title: 'Événement 3', start: '2024-10-31T14:00:00', end: '2024-10-31T15:00:00' },
                ],
            });

            calendar.render();
        });

     
    

    </script>


    <div id='calendar'></div>




</thead>
</table>
</section>
<div class="d-flex" id="home_hour"><p class=" d-flex hour"></p></div>
<script src="view/home/home.js"></script>