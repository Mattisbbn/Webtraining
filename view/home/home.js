function showTime() {
    const now = new Date();
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    const timeString = hours + ':' + minutes + ':' + seconds;
    
    document.querySelector('#home_hour p').textContent = timeString;
}
setInterval(showTime, 1000);
window.onload = showTime;

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
            right: false
        },
        locale: 'fr',
        allDaySlot: false,
        nowIndicator: true,
        views: {
            timeGrid: {
                duration: { days: 3 }, 
            },
      
        },

        
        events: events
    });

    calendar.render();
});