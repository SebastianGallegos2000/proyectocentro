@extends('layouts.layoutadmin')
@section('title','Citas Administrador')
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
    });

    calendar.render();
});
    </script>
</div>
</html>
@endsection