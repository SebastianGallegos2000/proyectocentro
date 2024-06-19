@extends('layouts.layoutpersonal')
@section('title','Citas Personal')
@section('content')

<div class="container" id="container-user">
    <div class="row" id="container-text">
        <h4>
            Datos del Personal
        </h4>


        <div class="col-sm" id="user-1">
            <label id="dato">{{ auth()->user()->persona->rut_Persona }}</label>
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
            <label id="dato">
                @if($mascota->nroChip_Mascota)
                    {{ $mascota->nroChip_Mascota }}
                @else
                    No posee
                @endif
            </label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{ $mascota->nombre_Mascota}}</label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{ $mascota->razamascotas->nombre_Razamascota }}</label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{ $mascota->peso_Mascota }}</label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{ $mascota->edad_Mascota }}</label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{ $mascota->especie_Mascota }}</label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{ $mascota->sexo_Mascota }}</label>
        </div>
    </div>
</div>

<div class="container" id="container-user">
    <div class="row" id="container-text">
        <h4>
            Datos de la Cita
        </h4>
        <div class="col-sm" id="user-1">
            <label id="dato">{{ $solicitud->tipoatencion->nombre_TipoAtencion}}</label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{ $solicitud->fecha_SolicitudCita}}</label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{ $solicitud->horaInicio_SolicitudCita}}</label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{ $solicitud->horaTermino_SolicitudCita}}</label>
        </div>
    </div>
</div>
<div class="container" id="container-user">
    <div class="row" id="container-text">
        <form action="" method="POST">
            @csrf
            <input type="hidden" name="solicitudcita_id" value="{{ $solicitud->id }}">
            <input type="hidden" name="personal_id" value="{{ $user->id }}">
            <div class="form-group">
                <label for="observacion_Atencion">Observación:</label>
                <textarea class="form-control" id="observacion_Atencion" name="observacion_Atencion"></textarea>
            </div>
            <div class="form-group">
                <label for="peso_Atencion">Peso:</label>
                <input type="number" class="form-control" id="peso_Atencion" name="peso_Atencion">
            </div>
            <div class="form-group">
                <label for="estado_Atencion">Estado:</label>
                <select class="form-control" id="estado_Atencion" name="estado_Atencion">
                    <option value="2">Realizada</option>
                    <option value="0">Cancelada</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
</html>
@endsection