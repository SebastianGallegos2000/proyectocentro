@extends('layouts.layoutadmin')

@section('content')
<div class="container p-4">
    <div class="col-12">
        <div>
            <h2>Editar Tutor</h2>
        </div>
        <div>
            <a href="/usuarios" class="btn btn-primary">Volver</a>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ha ocurrido un error </strong> Revisar los campos<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{route('updateTutor',$tutor )}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container p-5">
        <div class="mb-3 row">
            <div class="mb-3">
                <strong>Rut (sin digito verificador):</strong>
                <input type="text" name="rut_Tutor" class="form-control" placeholder="11222333" maxlength="8" value="{{$tutor->rut_Tutor}}" disabled >
            </div>

            <div class="mb-3">
                <strong>Digito verificador:</strong>
                <input type="text" name="dv_Tutor" class="form-control" placeholder="1" value="{{$tutor->dv_Tutor}}" disabled>
            </div>

            <div class="mb-3">
                <strong>Crea tu contraseña:</strong>
                <input type="password" name="password_Tutor" class="form-control" placeholder="*******" value="{{$tutor->password_Tutor}}" >
            </div>

            <div class="mb-3">
                <strong>Nombre:</strong>
                <input type="text" name="nombre_Tutor" class="form-control" placeholder="Nombre" value="{{$tutor->nombre_Tutor}}" >
            </div>

            <div class="mb-3">
                <strong>Apellido:</strong>
                <input type="text" name="apellido_Tutor" class="form-control" placeholder="Apellido" value="{{$tutor->apellido_Tutor}}" >
            </div>

            <div class="mb-3">
                <strong>Correo:</strong>
                <input type="text" name="correo_Tutor" class="form-control" placeholder="correo@ejemplo.com" value="{{$tutor->correo_Tutor}}" >
            </div>

            <div class="mb-3">
                <strong>Fecha de nacimiento:</strong>
                <input type="date" name="fechaNac_Tutor" class="form-control" value="{{\Carbon\Carbon::parse($tutor->fechaNac_Tutor)->format('Y-m-d') }}">
            </div>

            <div class="mb-3">
                <strong>Numero de Teléfono:</strong>
                <input type="text" name="telefono_Tutor" class="form-control" placeholder="+56912345678" value="{{$tutor->telefono_Tutor}}" >
            </div>
            <div class="mb-3">
                <strong>Comuna:</strong>
                <select name="id_Comuna_Tutor" class="form-select" id="">
                    <option value="">-- Elige comuna --</option>
                    <option value="1" {{ $tutor->id_Comuna_Tutor == 1 ? 'selected' : '' }}>Viña del mar</option>
                    <option value="2" {{ $tutor->id_Comuna_Tutor == 2 ? 'selected' : '' }}>Casablanca</option>
                    <option value="3" {{ $tutor->id_Comuna_Tutor == 3 ? 'selected' : '' }}>Concón</option>
                    <option value="4" {{ $tutor->id_Comuna_Tutor == 4 ? 'selected' : '' }}>Juan Fernández</option>
                    <option value="5" {{ $tutor->id_Comuna_Tutor == 5 ? 'selected' : '' }}>Puchuncaví</option>
                    <option value="6" {{ $tutor->id_Comuna_Tutor == 6 ? 'selected' : '' }}>Quintero</option>
                    <option value="7" {{ $tutor->id_Comuna_Tutor == 7 ? 'selected' : '' }}>Valparaíso</option>
                </select>
            </div>
            <div class="mb-3">
                <strong>Fotocopia carnet:</strong>
                @if($tutor->fotocopiacarnet_Tutor)
                    <p>Archivo actual: <a href="{{ asset('storage/fotocopiacarnet/' . $tutor->rut_Tutor .'_Fotocopia_Carnet.pdf') }}">Ver Fotocopia Carnet</a></p>
                @endif
                <input type="file" name="fotocopiacarnet_Tutor" class="form-control" placeholder="--Ingresa el documento--" accept=".pdf">
            </div>

            <div class="mb-3">
                <strong>Fotocopia Registro Social:</strong>
                @if($tutor->registrosocial_Tutor)
                    <p>Archivo actual: <a href="{{ asset('storage/registrosocial/' . $tutor->rut_Tutor .'_Registro_Social.pdf') }}">Ver Registro Social</a></p>
                @endif
                <input type="file" name="registrosocial_Tutor" class="form-control" placeholder="--Ingresa el documento--" accept=".pdf">
            </div>
    
            <div class="mb-3">
                <input type="text" name="id_Rol_Tutor" class="form-control" placeholder="" value="1" hidden >
            </div>

            <div class="form-check form-switch">
                <input type="hidden" name="estado_Tutor" value="0">
                <input class="form-check-input" type="checkbox" name="estado_Tutor" id="flexSwitchCheckChecked" {{ $tutor->estado_Tutor ? 'checked' : '' }} value="1">
                <label class="form-check-label" for="flexSwitchCheckChecked">Estado</label>
            </div>

            <div id="botonCrear" class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </div>
</form>
</div>
@endsection