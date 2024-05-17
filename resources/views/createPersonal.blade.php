@extends('layouts.layoutadmin')

@section('content')

<!--<script src="js/rutValidador.js"></script> -->
<!-- <script src="js/funciones.js"></script> -->
<div class="row">
    <div class="col-12">
        <div>
            <h2>Crear Cuenta</h2>
        </div>
        <div>
            <a href="/admin" class="btn btn-primary">Volver</a>
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



    <form action="{{route('personal.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Rut (sin digito verificador):</strong>
                    <input type="text" name="rut_Personal" class="form-control" placeholder="11222333" maxlength="8" value="{{old('rut_Personal')}}" >
                </div>

                <div class="form-group">
                    <strong>Digito verificador:</strong>
                    <input type="text" name="dv_Personal" class="form-control" placeholder="1" value="{{old('dv_Personal')}}" >
                </div>

                <div class="form-group">
                    <strong>Crea tu contraseña:</strong>
                    <input type="password" name="password_Personal" class="form-control" placeholder="*******" value="{{old('password_Personal')}}" >
                </div>

                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre_Personal" class="form-control" placeholder="Nombre" value="{{old('nombre_Personal')}}" >
                </div>

                <div class="form-group">
                    <strong>Apellido:</strong>
                    <input type="text" name="apellido_Personal" class="form-control" placeholder="Apellido" value="{{old('apellido_Personal')}}" >
                </div>

                <div class="form-group">
                    <strong>Correo:</strong>
                    <input type="text" name="correo_Personal" class="form-control" placeholder="correo@ejemplo.com" value="{{old('correo_Personal')}}" >
                </div>

                <div class="form-group">
                    <strong>Fecha de nacimiento:</strong>
                    <input type="date" name="fechaNac_Personal" class="form-control" value="{{old('fechaNac_Personal')}}">
                </div>

                <div class="form-group">
                    <strong>Numero de Teléfono:</strong>
                    <input type="text" name="telefono_Personal" class="form-control" placeholder="+56912345678" value="{{old('telefono_Personal')}}" >
                </div>
                <div class="form-group">
                    <strong>Comuna:</strong>
                    <select name="id_Especialidad_Personal" class="form-select" id="">
                        <option value="">-- Elige comuna --</option>
                        <option value="1">Veterinario</option>
                        <option value="2">Anestesista</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="id_Rol_Personal" class="form-control" placeholder="" value="1" hidden >
                </div>

                <div class="form-group">
                    <input type="text" name="estado_Personal" class="form-control" placeholder="" value="1" hidden >
                </div>

            <div id="botonCrear" class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
@endsection