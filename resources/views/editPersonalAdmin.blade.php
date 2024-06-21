@extends('layouts.layoutadmin')

@section('content')
<div class="container p-5">
    <div class="col-12">
        <div>
            <h2>Editar Personal</h2>
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

<form action="{{route('updatePersonalAdmin',['id'=>$personal->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container p-5">
        <div class="mb-3 row">
            <div class="mb-3">
                <strong>Rut (sin digito verificador):</strong>
                <input type="text" name="rut_Persona" class="form-control" placeholder="11222333" maxlength="8" value="{{$personal->persona->rut_Persona}}" disabled >
            </div>

            <div class="mb-3">
                <strong>Digito verificador:</strong>
                <input type="text" name="dv_Persona" class="form-control" placeholder="1" value="{{$personal->persona->dv_Personal}}" disabled>
            </div>

            <div class="mb-3">
                <strong>Crea tu contraseña:</strong>
                <input type="password" name="password_Persona" class="form-control" placeholder="*******" value="" >
            </div>

            <div class="mb-3">
                <strong>Nombre:</strong>
                <input type="text" name="nombre_Persona" class="form-control" placeholder="Nombre" value="{{$personal->persona->nombre_Persona}}" >
            </div>

            <div class="mb-3">
                <strong>Apellido:</strong>
                <input type="text" name="apellido_Persona" class="form-control" placeholder="Apellido" value="{{$personal->persona->apellido_Persona}}" >
            </div>

            <div class="mb-3">
                <strong>Correo:</strong>
                <input type="text" name="correo_Persona" class="form-control" placeholder="correo@ejemplo.com" value="{{$personal->persona->correo_Persona}}" >
            </div>

            <div class="mb-3">
                <strong>Fecha de nacimiento:</strong>
                <input type="date" name="fechaNac_Persona" class="form-control" value="{{\Carbon\Carbon::parse($personal->persona->fechaNac_Persona)->format('Y-m-d') }}">
            </div>

            <div class="mb-3">
                <strong>Numero de Teléfono:</strong>
                <input type="text" name="telefono_Persona" class="form-control" placeholder="+56912345678" value="{{$personal->persona->telefono_Persona}}" >
            </div>
            <div class="mb-3">
                <strong>Especialidad:</strong>
                <select name="especialidad_id" class="form-select" id="">
                    <option value="">-- Elige especialidad --</option>
                    @foreach($especialidades as $especialidad)
                        <option value="{{ $especialidad->id }}" {{ $personal->especialidad->id == $especialidad->id ? 'selected' : '' }}>
                            {{ $especialidad->nombre_Especialidad }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input type="text" name="rol_id" class="form-control" placeholder="" value="1" hidden >
            </div>
            <div class="mb-3">
                <input type="text" name="estado_Personal" class="form-control" placeholder="" value="1" hidden >
            </div>
            <div class="mb-3">
                <input type="text" name="estado_Usuario" class="form-control" placeholder="" value="1" hidden >
            </div>
            <div class="mb-3">
                <input type="text" name="estado_Persona" class="form-control" placeholder="" value="1" hidden >
            </div>

        <div id="botonCrear" class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </div>
</form>
</div>
@endsection