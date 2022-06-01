function openCalendar() {
$('#modalTakvim').modal();



}

$("#modalTakvim").on('shown.bs.modal', function(e){
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        timeZone: 'UTC',
        locale: 'tr',
        //initialView: 'resourceTimelineDay',
        aspectRatio: 1.5,
        headerToolbar: {
            left: 'prev,next',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        editable: true,
        resourceAreaHeaderContent: 'Rooms',
        //resources: 'https://fullcalendar.io/demo-resources.json?with-nesting&with-colors',
        //events: 'https://fullcalendar.io/demo-events.json?single-day&for-resource-timeline'
    });

    calendar.render();
})


