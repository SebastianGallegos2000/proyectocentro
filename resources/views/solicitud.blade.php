@extends('layouts.layouttutores')
@section('title','Agendar Hora')
@section('content')
<div>
    <a href="{{route('privada')}}" class="btn btn-info">Volver</a>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container" id="container-user">
    <div class="row" id="container-text">


        <h4>
            Tus Datos
        </h4>


        <div class="col-sm" id="user-1">
            <label id="dato">{{ auth()->user()->persona->rut_Persona}}</label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{ auth()->user()->persona->nombre_Persona}}</label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{ auth()->user()->persona->apellido_Persona }}</label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{ auth()->user()->persona->correo_Persona }}</label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{ \Carbon\Carbon::parse(auth()->user()->persona->fechaNac_Persona)->format('d-m-Y') }}</label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{ auth()->user()->persona->telefono_Persona }}</label>
        </div>
    </div>
</div>
<div class="container" id="container-user">
    <div class="row" id="container-text">
        <h4>
            Datos de la Mascota
        </h4>


        <div class="col-sm" id="user-1">
            <label id="dato">{{$mascota->id}}</label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{$mascota->nombre_Mascota }}</label>
        </div>
        
        <div class="col-sm" id="user-1">
            <label id="dato">{{$mascota->nroChip_Mascota ? $mascota->nroChip_Mascota : 'No posee'}}</label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{$mascota->especie_Mascota}}</label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{$mascota->sexo_Mascota}}</label>
        </div>
    </div>
</div>

<div class="container" id="container-user">
        <form action="{{route('storeSolicitudCitas')}}" method="POST">
            @csrf
            <div class="row" id="container-text">
            <div class="col-md-6">
                <div class="mb-3">
                    <input type="text" name="mascota_id" class="form-control" placeholder="1" value="{{$mascota->id}}" hidden >
                </div>
                <div class="mb-3">
                    <strong>Fecha de la Cita:</strong>
                    <input type="text" name="fecha_SolicitudCita" id="datepicker" class="form-control" placeholder="" value="" >
                </div>
                <div class="mb-3">
                    <strong>Tipo atencion:</strong>
                    <select name="tipoatencion_id" id="tipoatencion_id">
                        <option value="">--ELIGE UNA OPCIÓN--</option>
                    @foreach ($tipoatencion as $tipo)
                        <option value="{{$tipo->id}}" >{{$tipo->nombre_TipoAtencion}}</option>                  
                    @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <strong>Horario Inicio:</strong>
                    <input type="text" name="horaInicio_SolicitudCita" id="timepicker_inicio" class="form-control" placeholder="" value="" >
                    <h5>(Recuerda que los horarios de Cirugía y los Horarios de Control son diferentes)</h5>
                    <h5>(Si tienes una camada de 5 o más mascotas, debes agendar 2 horas con la opción Consulta)</h5>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Agendar</button>
                </div>
            </div>
            <div class="col-md-6">
            <div class="mb-3" id="controlSanoHorarios" style="display: none;">
                <strong>Horarios disponibles control sano:</strong>
                @for ($i = 8; $i <= 18; $i += 0.5)
                    @php
                        $hora = str_pad(floor($i), 2, '0', STR_PAD_LEFT) . ':' . (($i - floor($i)) == 0.5 ? '30' : '00') . ':00';
                    @endphp
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('timepicker_inicio').value = '{{ $hora }}'">
                        {{ $hora }}
                    </button>
                @endfor
            </div>

            <div class="mb-3" id="cirugiaHorarios" style="display: none;">
                <strong>Horarios disponibles cirugía:</strong>
                @for ($i = 8; $i <= 18; $i++)
                    @php
                        $hora = str_pad($i, 2, '0', STR_PAD_LEFT) . ':00'.':00';
                    @endphp
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('timepicker_inicio').value = '{{ $hora }}'">
                        {{ $hora }}
                    </button>
                @endfor
            </div>

            <div class="mb-3">
                <input type="text" name="horaTermino_SolicitudCita" id="timepicker_final" class="form-control" placeholder="" value="" hidden>
            </div>
            <div class="mb-3">
                <input type="text" name="estado_SolicitudCita" class="form-control" placeholder="" value="1" hidden >
            </div>
            

            <div id='calendar'></div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar');
            
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        locale: 'es',
                        events: function(fetchInfo, successCallback, failureCallback) {
                            fetch('/events?start=' + fetchInfo.startStr + '&end=' + fetchInfo.endStr)
                                .then(response => response.json())
                                .then(data => {
                                    var events = data.map(function(event) {
                                        return {
                                            ...event,
                                            title: 'Ocupado'
                                        };
                                    });
                                    successCallback(events);
                                })
                                .catch(failureCallback);
                        },
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
        </form>

        <script>
        $(document).ready(function(){
            // Configuración inicial del timepicker
            $('#timepicker_inicio, #timepicker_final').timepicker({
                timeFormat: 'HH:mm:ss',
                minTime: '8:00',
                maxTime: '17:00',
                defaultTime: '8:00',
                startTime: '8:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true,
            });

            // Detectar cambios en el select de tipoatencion_id y en el timepicker de horaInicio_SolicitudCita
            $('select[name="tipoatencion_id"], #timepicker_inicio').change(function() {
                var selectedValue = $('select[name="tipoatencion_id"]').val();
                var startTime = $('#timepicker_inicio').timepicker('getTime');
            
                if (selectedValue == '1') {
                    // Si el valor seleccionado es 1, establecer el intervalo a 30 minutos
                    $('#timepicker_inicio').timepicker('option', 'interval', 30);
                    var endTime = new Date(startTime.getTime() + 30*60000);
                    $('#timepicker_final').timepicker('setTime', endTime);
                } else if (selectedValue > '1') {
                    // Si el valor seleccionado es mayor a 1, establecer el intervalo a 1 hora
                    $('#timepicker_inicio').timepicker('option', 'interval', 60);
                    var endTime = new Date(startTime.getTime() + 60*60000);
                    $('#timepicker_final').timepicker('setTime', endTime);
                }
            });
        });
        </script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.getElementById('tipoatencion_id').addEventListener('change', function() {
                var cirugiaHorarios = document.getElementById('cirugiaHorarios');
                var controlSanoHorarios = document.getElementById('controlSanoHorarios');
                var horariosElement;
                var fechaSolicitudCita = document.getElementById('datepicker').value;

                if (this.value == '1') {
                    controlSanoHorarios.style.display = 'block';
                    cirugiaHorarios.style.display = 'none';
                    horariosElement = controlSanoHorarios;
                } else {
                    controlSanoHorarios.style.display = 'none';
                    cirugiaHorarios.style.display = 'block';
                    horariosElement = cirugiaHorarios;
                }
            
                // Hacer una solicitud AJAX para obtener los horarios ocupados
                fetch(`/horarios_ocupados?tipoatencion_id=${this.value}&fecha_SolicitudCita=${fechaSolicitudCita}`)
                    .then(response => response.json())
                    .then(data => {
                        // Iterar sobre los horarios y deshabilitar el botón si el horario está ocupado
                        for (let i = 8; i <= 18; i += 0.5) {
                            let hora = String(Math.floor(i)).padStart(2, '0') + ':' + ((i - Math.floor(i)) == 0.5 ? '30' : '00') + ':00';
                            let button = horariosElement.querySelector(`button[value="${hora}"]`);
                            if (button) {
                                if (data.includes(hora)) {
                                    button.setAttribute('disabled', 'disabled');
                                    button.setAttribute('tabindex', '-1');
                                } else {
                                    button.removeAttribute('disabled');
                                    button.removeAttribute('tabindex');
                                }
                            }
                        }
                    });
            });
        });
    </script>
    </div>
</div>
    @endsection
