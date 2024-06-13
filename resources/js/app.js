import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
// import PerfectScrollbar from 'perfect-scrollbar';

document.addEventListener('DOMContentLoaded', function() {
    // const ps = new PerfectScrollbar('#your-scrollable-element'); // Commented out for simplicity

    var calendarEl = document.getElementById('calendar');
    var eventsUrl = calendarEl.getAttribute('data-events-url');
    var calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
        initialView: 'timeGridWeek',
        events: eventsUrl,
        headerToolbar: {
            left: '',
            center: '',
            right: ''
        },
        slotMinTime: '08:00:00',
        slotMaxTime: '23:00:00'
    });

    calendar.render();

    document.getElementById('prevWeek').addEventListener('click', function() {
        calendar.prev();
    });

    document.getElementById('nextWeek').addEventListener('click', function() {
        calendar.next();
    });
});
