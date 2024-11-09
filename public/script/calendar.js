document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        slotMinTime: '07:00:00',
        slotMaxTime: '19:00:00',
        themeSystem: 'bootstrap5',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: false,
          
        },
        locale: 'fr',
        allDaySlot: false,
        nowIndicator: true,
        eventColor: '#45cfc1',
    
     
        views: {
            timeGrid: {
                duration: { days: 3 }, 
                 
            },
      
        },

       
        events: events
       
    });

    calendar.render();
});