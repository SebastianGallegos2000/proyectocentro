@extends('layouts.layouttutores')
@section('title','Agendar Hora')
@section('content')

<div class="container" id="container-user">
    <div class="row" id="container-text">
        <center>
        <h4>TU HORA HA SIDO AGENDADA CON ÉXITO</h4>
        <h3>DETALLES DE LA CITA:</h3>
        @if($solicitud)
        <h4>Fecha: {{$solicitud->fecha_SolicitudCita}}</h4>
        <h4>Hora: {{$solicitud->horaInicio_SolicitudCita}}</h4>
        <h4>Hasta: {{$solicitud->horaTermino_SolicitudCita}}</h4>
        <h4>Mascota: {{$solicitud->mascota->nombre_Mascota}}</h4>
        <h4>Servicio: {{$solicitud->tipoAtencion->nombre_TipoAtencion}}</h4>
        @else
        <h4>No se encontraron detalles</h4>
        @endif

        <div>
            <a href="{{route('privada')}}" class="btn btn-info">Volver</a>
        </div>

        </center>
    </div>
</div>

@endsection