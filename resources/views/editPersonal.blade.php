@extends('layouts.layoutpersonal')

@section('content')
<div class="container p-5">
    <div class="col-12">
        <div>
            <h2>Editar Personal</h2>
        </div>
        <div>
            <a href="{{route('perfilPersonal')}}" class="btn btn-primary">Volver</a>
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

<form action="{{route('updatePersonal',$personal,$persona,$user,$especialidades)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container p-5">
        <div class="mb-3 row">
            <div class="mb-3">
                <strong>Rut (sin digito verificador):</strong>
                <input type="text" name="rut_Persona" class="form-control" placeholder="11222333" maxlength="8" value="{{$persona->rut_Persona}}" disabled >
            </div>

            <div class="mb-3">
                <strong>Digito verificador:</strong>
                <input type="text" name="dv_Persona" class="form-control" placeholder="1" value="{{$persona->dv_Persona}}" disabled>
            </div>

            <div class="mb-3">
                <strong>Contraseña:</strong>
                <input type="password" name="password_Persona" class="form-control" placeholder="*******" value="{{$user->password_Usuario}}" >
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
                <input type="text" name="correo_Persona" class="form-control" placeholder="correo@ejemplo.com" value="{{$persona->correo_Persona}}" >
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
                <strong>Especialidad:</strong>
                <select name="especialidad_id" class="form-select" id="">
                    <option value="">-- Elige Especialidad --</option>
                    @foreach ($especialidades as $especialidad)
                    <option value="{{$especialidad->id}}" {{$personal->especialidad_id == $especialidad->id ? 'selected':''}}>{{$especialidad->nombre_Especialidad}}</option>
                    @endforeach
                </select>
            </div>
        <div id="botonCrear" class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </div>
</form>
</div>
@endsection