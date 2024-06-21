@extends('layouts.layoutpersonal')
@section('title','Citas Personal')
@section('content')

<div class="container" id="container-user">
    <div class="row" id="container-text">

        <div class="container p-5 my-5 border">
            <H4 style="margin-bottom: 5%">SOLICITUDES</H4>
            <table id="table-solicitudes" class="display responsive nowrap" width="100%">
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
                        <a href="#" class="btn btn-danger cancel-button" data-id="{{ $solicitud->id }}" type="button">Cancelar</a>
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

    <div id='calendar' style="margin-top: 10%"></div>

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
        slotMinTime: '08:00:00',
        slotMaxTime: '19:00:00',
        contentHeight: 'auto',
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

<script>
$(document).ready(function() {
    $('.cancel-button').on('click', function(e) {
        e.preventDefault();

        var confirmation = confirm('¿Estás seguro de que quieres cancelar esta solicitud?');
        if (!confirmation) {
            return;
        }

        var solicitudId = $(this).data('id');

        $.ajax({
            url: '/solicitud_citas/' + solicitudId + '/cancelar',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function() {
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(textStatus, errorThrown);
            }
        });
    });
});
</script>
</div>
</html>
@endsection