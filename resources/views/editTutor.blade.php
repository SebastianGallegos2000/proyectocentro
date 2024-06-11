@extends('layouts.layouttutores')

@section('content')
<div class="container p-4">
    <div class="col-12">
        <div>
            <h2>Editar Tutor</h2>
        </div>
        <div>
            <a href="{{route('perfilTutor')}}" class="btn btn-primary">Volver</a>
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


<form action="{{route('updateTutor',$tutor,$persona,$user,$comunas )}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container p-5">
        <div class="mb-3 row">
            <div class="mb-3">
                <strong>Rut (sin digito verificador):</strong>
                <input type="text" name="rut_Persona" class="form-control" placeholder="11222333" maxlength="8" value="{{$persona->rut_Persona}}" disabled>
            </div>

            <div class="mb-3">
                <strong>Digito verificador:</strong>
                <input type="text" name="dv_Persona" class="form-control" placeholder="1" value="{{$persona->dv_Persona}}" disabled>
            </div>

            <div class="mb-3">
                <strong>Actualiza tu contraseña:</strong>
                <input type="password" name="password_Usuario" class="form-control" placeholder="*******" value="" >
            </div>

            <div class="mb-3">
                <strong>Nombre:</strong>
                <input type="text" name="nombre_Persona" class="form-control" placeholder="Nombre" value="{{$persona->nombre_Persona}}" >
            </div>

            <div class="mb-3">
                <strong>Apellido:</strong>
                <input type="text" name="apellido_Persona" class="form-control" placeholder="Apellido" value="{{$persona->apellido_Persona}}" >
            </div>

            <div class="mb-3">
                <strong>Correo:</strong>
                <input type="email" name="correo_Persona" class="form-control" placeholder="correo@ejemplo.com" value="{{$persona->correo_Persona}}" >
            </div>

            <div class="mb-3">
                <strong>Fecha de nacimiento:</strong>
                <input type="date" name="fechaNac_Persona" class="form-control" value="{{\Carbon\Carbon::parse($persona->fechaNac_Persona)->format('Y-m-d') }}">
            </div>

            <div class="mb-3">
                <strong>Numero de Teléfono:</strong>
                <input type="text" name="telefono_Persona" class="form-control" placeholder="+56912345678" value="{{$persona->telefono_Persona}}" >
            </div>
            <div class="mb-3">
                <strong>Comuna:</strong>
                <select name="comuna_id" class="form-select" id="">
                    <option value="">-- Elige comuna --</option>
                    @foreach ($comunas as $comuna)
                        <option value="{{ $comuna->id }}" {{ $tutor->comuna_id == $comuna->id ? 'selected' : '' }}>{{ $comuna->nombre_Comuna }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <strong>Fotocopia carnet:</strong>
                @if($tutor->fotocopiacarnet_Tutor)
                    <p>Archivo actual: <a href="{{ asset('storage/fotocopiacarnet/' . $persona->rut_Persona .'_Fotocopia_Carnet.pdf') }}">Ver Fotocopia Carnet</a></p>
                @endif
                <input type="file" name="fotocopiacarnet_Tutor" class="form-control" placeholder="--Ingresa el documento--" accept=".pdf">
            </div>

            <div class="mb-3">
                <strong>Fotocopia Registro Social:</strong>
                @if($tutor->registrosocial_Tutor)
                    <p>Archivo actual: <a href="{{ asset('storage/registrosocial/' . $persona->rut_Persona .'_Registro_Social.pdf') }}">Ver Registro Social</a></p>
                @endif
                <input type="file" name="registrosocial_Tutor" class="form-control" placeholder="--Ingresa el documento--" accept=".pdf">
            </div>
    
            <div class="mb-3">
                <input type="text" name="rol_id" class="form-control" placeholder="" value="1" hidden >
            </div>

            <div id="botonCrear" class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </div>
</form>
</div>
@endsection