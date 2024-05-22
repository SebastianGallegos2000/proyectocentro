@extends('layouts.layout')

@section('content')

<!--<script src="js/rutValidador.js"></script> -->
<!-- <script src="js/funciones.js"></script> -->
<div class="container p-4">
    <div class="col-12">
        <div>
            <h2>Crear Cuenta</h2>
        </div>
        <div>
            <a href="/loginTutor" class="btn btn-primary">Volver</a>
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



    <form action="{{route('validar-registro')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container p-4">
            <div class="mb-3 row">
                <div class="mb-3">
                    <strong>Rut (sin digito verificador):</strong>
                    <input type="text" name="rut_Tutor" class="form-control" placeholder="11222333" maxlength="8" value="{{old('rut_Tutor')}}" >
                </div>

                <div class="mb-3">
                    <strong>Digito verificador:</strong>
                    <input type="text" name="dv_Tutor" class="form-control" placeholder="1" value="{{old('dv_Tutor')}}" >
                </div>

                <div class="mb-3">
                    <strong>Crea tu contraseña:</strong>
                    <input type="password" name="password_Tutor" class="form-control" placeholder="*******" value="{{old('password_Tutor')}}" >
                </div>

                <div class="mb-3">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre_Tutor" class="form-control" placeholder="Nombre" value="{{old('nombre_Tutor')}}" >
                </div>

                <div class="mb-3">
                    <strong>Apellido:</strong>
                    <input type="text" name="apellido_Tutor" class="form-control" placeholder="Apellido" value="{{old('apellido_Tutor')}}" >
                </div>

                <div class="mb-3">
                    <strong>Correo:</strong>
                    <input type="text" name="correo_Tutor" class="form-control" placeholder="correo@ejemplo.com" value="{{old('correo_Tutor')}}" >
                </div>

                <div class="mb-3">
                    <strong>Fecha de nacimiento:</strong>
                    <input type="date" name="fechaNac_Tutor" class="form-control" value="{{old('fechaNac_Tutor')}}">
                </div>

                <div class="mb-3">
                    <strong>Numero de Teléfono:</strong>
                    <input type="text" name="telefono_Tutor" class="form-control" placeholder="+56912345678" value="{{old('telefono_Tutor')}}" >
                </div>

                <div class="mb-3">
                    <strong>Comuna:</strong>
                    <select name="id_Comuna_Tutor" class="form-select" id="">
                    <option value="">-- Elige comuna --</option>
                @foreach ($comunas as $comuna)
                    <option value="{{$comuna->id_Comuna}}">{{$comuna->nombre_Comuna}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <strong>Fotocopia carnet:</strong>
                    <input type="file" name="fotocopiacarnet_Tutor" class="form-control" placeholder="--Ingresa el documento--" value="{{old('fotocopiacarnet_Tutor')}}" accept=".pdf">
                </div>

                <div class="mb-3">
                    <strong>Registro social:</strong>
                    <input type="file" name="registrosocial_Tutor" class="form-control" placeholder="--Ingresa el documento--" value="{{old('registrosocial_Tutor')}}" accept=".pdf">
                </div>
        
                <div class="mb-3">
                    <input type="text" name="id_Rol_Tutor" class="form-control" placeholder="" value="1" hidden >
                </div>

                <div class="mb-3">
                    <input type="text" name="estado_Tutor" class="form-control" placeholder="" value="1" hidden >
                </div>

            <div id="botonCrear" class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
@endsection