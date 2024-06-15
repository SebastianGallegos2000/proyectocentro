@extends('layouts.layoutpersonal')
@section('title','Citas Personal')
@section('content')

<div class="container" id="container-user">
    <div class="row" id="container-text">

    <div id='calendar'></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'es',
        events: '/events',
        initialView: 'timeGridWeek',
        slotLabelFormat: {
            hour: 'numeric',
            minute: '2-digit',
            meridiem: 'short'
        },
        slotMinTime: '07:00:00',
        customButtons: {
            expandToday: {
                text: 'Expandir Hoy',
                click: function() {
                    calendar.changeView('timeGridDay');
                    calendar.today();
                }
            }
        },
        headerToolbar: {
            left: 'prev,next today expandToday',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
    });

    calendar.render();
});
</script>
</div>
</html>
@endsection