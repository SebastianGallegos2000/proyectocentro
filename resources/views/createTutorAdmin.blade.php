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
            <a href="{{route('usuarios')}}" class="btn btn-primary">Volver</a>
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



    <form action="{{route('storeTutor')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container p-4">
            <div class="mb-3 row">
                <div class="mb-3">
                    <strong>Rut (sin digito verificador):</strong>
                    <input type="text" name="rut_Persona" class="form-control" placeholder="11222333" maxlength="8" value="{{old('rut_Persona')}}" >
                </div>

                <div class="mb-3">
                    <strong>Digito verificador:</strong>
                    <input type="text" name="dv_Persona" class="form-control" placeholder="1" value="{{old('dv_Persona')}}" >
                </div>

                <div class="mb-3">
                    <strong>Crea tu contraseña:</strong>
                    <input type="password" name="password_Usuario" class="form-control" placeholder="*******" value="{{old('password_Usuario')}}" >
                </div>

                <div class="mb-3">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre_Persona" class="form-control" placeholder="Nombre" value="{{old('nombre_Persona')}}" >
                </div>

                <div class="mb-3">
                    <strong>Apellido:</strong>
                    <input type="text" name="apellido_Persona" class="form-control" placeholder="Apellido" value="{{old('apellido_Persona')}}" >
                </div>

                <div class="mb-3">
                    <strong>Correo:</strong>
                    <input type="email" name="correo_Persona" class="form-control" placeholder="correo@ejemplo.com" value="{{old('correo_Persona')}}" >
                </div>

                <div class="mb-3">
                    <strong>Fecha de nacimiento:</strong>
                    <input type="date" name="fechaNac_Persona" class="form-control" value="{{old('fechaNac_Persona')}}">
                </div>

                <div class="mb-3">
                    <strong>Numero de Teléfono:</strong>
                    <input type="text" name="telefono_Persona" class="form-control" placeholder="+56912345678" value="{{old('telefono_Persona')}}" >
                </div>

                <div class="mb-3">
                    <strong>Comuna:</strong>
                    <select name="comuna_id" class="form-select" id="">
                    <option value="">-- Elige comuna --</option>
                @foreach ($comunas as $comuna)
                    <option value="{{$comuna->id}}">{{$comuna->nombre_Comuna}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <strong>Fotocopia carnet:</strong>
                    <input type="file" name="fotocopiacarnet_Tutor" class="form-control" placeholder="--Ingresa el documento--" value="{{old('fotocopiacarnet_Tutor')}}" accept=".pdf">
                </div>

                <div class="mb-3">
                    <strong>Registro social:</strong>
                    <a href="https://rsh.ministeriodesarrollosocial.gob.cl/portada">Descargalo desde aquí</a>
                    <input type="file" name="registrosocial_Tutor" class="form-control" placeholder="--Ingresa el documento--" value="{{old('registrosocial_Tutor')}}" accept=".pdf">
                </div>
        
                <div class="mb-3">
                    <input type="text" name="rol_id" class="form-control" placeholder="" value="1" hidden >
                </div>

                <div class="mb-3">
                    <input type="text" name="estado_Persona" class="form-control" placeholder="" value="1" hidden >
                </div>

                <div class="mb-3">
                    <input type="text" name="estado_Usuario" class="form-control" placeholder="" value="1" hidden >
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