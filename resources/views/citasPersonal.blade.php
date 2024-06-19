@extends('layouts.layoutpersonal')
@section('title','Citas Personal')
@section('content')

<div class="container" id="container-user">
    <div class="row" id="container-text">

        <div class="container p-5 my-5 border">
            <table id="table-solicitudes" class="display responsive nowrap" width="100%">
                <H4>SOLICITUDES</H4>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Servicio</th>
                    <th>Nombre Mascota</th>
                    <th>Fecha</th>
                    <th>Hora Inicio</th>
                    <th>Hora Término</th>
                    <th>Estado Solicitud</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($solicitudes as $solicitud)
                <tr>
                    <td>{{ $solicitud->id }}</td>
                    <td>{{ $solicitud->tipoatencion->nombre_TipoAtencion }}</td>
                    <td>{{ $solicitud->mascota->nombre_Mascota }}</td>
                    <td>{{ $solicitud->fecha_SolicitudCita }}</td>
                    <td>{{ $solicitud->horaInicio_SolicitudCita }}</td>
                    <td>{{ $solicitud->horaTermino_SolicitudCita }}</td>
                    <td>{{ $solicitud->estado_SolicitudCita }}</td>
                    @if($solicitud->estado_SolicitudCita == 1)
                    <td>
                        <a href="{{ route('createAtencion', ['id' => $solicitud->id]) }}" class="btn btn-success">Atender</a>
                        <a href="" class="btn btn-danger" type="button">Cancelar</a>
                    </td>
                    @endif
                    @if($solicitud->estado_SolicitudCita == 0)
                    <td>
                        CANCELADO
                    </td>
                    @endif
                    @if($solicitud->estado_SolicitudCita == 2)
                    <td>
                        ATENDIDO
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
        <script>
            $(document).ready( function () { //cambia el idioma a español
                
                $('#table-solicitudes').DataTable({
                    language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                }
                });
            } );
        </script>

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