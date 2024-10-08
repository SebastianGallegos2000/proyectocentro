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
            Datos del tutor
        </h4>
        <div class="col-sm" id="user-1">
            <label id="dato">{{ $mascota->tutor->persona->rut_Persona}}</label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{ $mascota->tutor->persona->nombre_Persona}}</label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{ $mascota->tutor->persona->apellido_Persona}}</label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{ $mascota->tutor->persona->correo_Persona}}</label>
        </div>
        <div class="col-sm" id="user-1">
            <label id="dato">{{ $mascota->tutor->persona->telefono_Persona}}</label>
        </div>
    </div>
</div>

<div class="container" id="container-user">
    <div class="row" id="container-text">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
        <form action="{{route('storeAtencion')}}" method="POST">
            @csrf
            <div id="div-formulario">
            <input type="hidden" name="solicitudcita_id" value="{{ $solicitud->id }}">
            <input type="hidden" name="personal_id" value="{{ auth()->user()->persona->personal->id }}">


            <div >
                <label for="observacion_Atencion">Observación:</label>
                <textarea class="form-control" id="form-control-atencion" name="observacion_Atencion"></textarea>
            </div>
            <div>
                <label for="instalacionMicrochip">Instalación de microchip:</label>
                <input type="checkbox" id="instalacionMicrochip">
            </div>
            <div id="nroChip_Mascota" style="display: none;">
                <label for="nroChip">Número de Chip:</label>
                <input type="text" class="form-control" id="nroChip" name="nroChip_Mascota">
            </div>
            <div>
                <label for="peso_Atencion">Peso:</label>
                <input type="number" class="form-control" id="peso_Atencion" name="peso_Atencion">
            </div>
            <input type="hidden" name="estado_Atencion" value="2">


            <div class="form-group" id="form-group-atencion">
                <label for="insumos">Insumos:</label>
                <div id="insumos-list">
                    <div class="row insumo-row">
                        <div class="col">
                            <select class="form-control" id="form-control-atencion" name="insumos[]">
                                @foreach($insumos as $insumo)
                                    <option value="{{ $insumo->id }}" {{ $insumo->cantidad_Insumo == 0 ? 'disabled' : '' }}>{{ $insumo->nombre_Insumo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="cantidad[]" placeholder="0">
                        </div>
                    </div>
                </div>
                <button type="button" id="add-insumo" class="btn btn-primary mt-2">Agregar otro insumo</button>
            </div>
            <div class="guardar-btn-container">
                <button type="submit" class="btn btn-primary" id="botón-guardar-atencion">Guardar</button>
            </div>
        </div>
        </form>
        
        <script>
document.getElementById('add-insumo').addEventListener('click', function() {
    var insumosList = document.getElementById('insumos-list');
    var newRow = document.createElement('div');
    newRow.className = 'row insumo-row mt-4';

    var newInsumo = document.createElement('div');
    newInsumo.className = 'col';
    // Asumiendo que tienes una forma de verificar la cantidad de cada insumo, por ejemplo, $insumo->cantidad
    newInsumo.innerHTML = '<select class="form-control" style="width:100%" name="insumos[]">@foreach($insumos as $insumo)<option value="{{ $insumo->id }}" {{ $insumo->cantidad_Insumo == 0 ? "disabled" : "" }}>{{ $insumo->nombre_Insumo }}</option>@endforeach</select>';
    newRow.appendChild(newInsumo);

    var newCantidad = document.createElement('div');
    newCantidad.className = 'col';
    newCantidad.innerHTML = '<input type="number" class="form-control" name="cantidad[]" placeholder="0">';
    newRow.appendChild(newCantidad);

    // Crear y añadir el botón de eliminar
    var deleteButtonDiv = document.createElement('div');
    deleteButtonDiv.className = 'col-auto';
    var deleteButton = document.createElement('button');
    deleteButton.className = 'btn btn-danger';
    deleteButton.innerHTML = 'x';
    deleteButton.type = 'button';
    deleteButton.addEventListener('click', function() {
        newRow.remove();
    });
    deleteButtonDiv.appendChild(deleteButton);
    newRow.appendChild(deleteButtonDiv);

    insumosList.appendChild(newRow);
});
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('instalacionMicrochip').addEventListener('change', function() {
                    if (this.checked) {
                        document.getElementById('nroChip_Mascota').style.display = 'block';
                    } else {
                        document.getElementById('nroChip_Mascota').style.display = 'none';
                    }
                });
            });
        </script>

    </div>
</div>
</html>
</html>
@endsection