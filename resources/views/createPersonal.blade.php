@extends('layouts.layoutadmin')

@section('content')

<!--<script src="js/rutValidador.js"></script> -->
<!-- <script src="js/funciones.js"></script> -->
<div class="container p-4">
    <div class="col-12">
        <div>
            <h2>Crear Cuenta</h2>
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



    <form action="{{route('storePersonal')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container p-4">
            <div class="mb-3 row">
                <div class="mb-3">
                    <strong>Rut (sin digito verificador):</strong>
                    <input type="text" name="rut_Personal" class="form-control" placeholder="11222333" maxlength="8" value="{{old('rut_Personal')}}" >
                </div>

                <div class="mb-3">
                    <strong>Digito verificador:</strong>
                    <input type="text" name="dv_Personal" class="form-control" placeholder="1" value="{{old('dv_Personal')}}" >
                </div>

                <div class="mb-3">
                    <strong>Crea tu contraseña:</strong>
                    <input type="password" name="password_Personal" class="form-control" placeholder="*******" value="{{old('password_Personal')}}" >
                </div>

                <div class="mb-3">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre_Personal" class="form-control" placeholder="Nombre" value="{{old('nombre_Personal')}}" >
                </div>

                <div class="mb-3">
                    <strong>Apellido:</strong>
                    <input type="text" name="apellido_Personal" class="form-control" placeholder="Apellido" value="{{old('apellido_Personal')}}" >
                </div>

                <div class="mb-3">
                    <strong>Correo:</strong>
                    <input type="text" name="correo_Personal" class="form-control" placeholder="correo@ejemplo.com" value="{{old('correo_Personal')}}" >
                </div>

                <div class="mb-3">
                    <strong>Fecha de nacimiento:</strong>
                    <input type="date" name="fechaNac_Personal" class="form-control" value="{{old('fechaNac_Personal')}}">
                </div>

                <div class="mb-3">
                    <strong>Numero de Teléfono:</strong>
                    <input type="text" name="telefono_Personal" class="form-control" placeholder="+56912345678" value="{{old('telefono_Personal')}}" >
                </div>
                <div class="mb-3">
                    <strong>Especialidad:</strong>
                    <select name="id_Especialidad_Personal" class="form-select" id="">
                    <option value="">-- Elige Especialidad --</option>
                @foreach ($especialidades as $especialidad)
                    <option value="{{$especialidad->id_Especialidad}}">{{$especialidad->nombre_Especialidad}}</option>
                @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <input type="text" name="id_Rol_Personal" class="form-control" placeholder="" value="2" hidden >
                </div>

                <div class="mb-3">
                    <input type="text" name="estado_Personal" class="form-control" placeholder="" value="1" hidden >
                </div>

            <div id="botonCrear" class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
@endsection