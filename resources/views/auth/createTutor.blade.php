@extends('layouts.layout')

@section('content')

<!--<script src="js/rutValidador.js"></script> -->
<!-- <script src="js/funciones.js"></script> -->
<div class="row">
    <div class="col-12">
        <div>
            <h2>Crear Cuenta</h2>
        </div>
        <div>
            <a href="/loginTutores" class="btn btn-primary">Volver</a>
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



    <form action="{{route('tutor.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Rut (sin digito verificador):</strong>
                    <input type="text" name="rut_Tutor" class="form-control" placeholder="11222333" maxlength="8" value="{{old('rut_Tutor')}}" >
                </div>

                <div class="form-group">
                    <strong>Digito verificador:</strong>
                    <input type="text" name="dv_Tutor" class="form-control" placeholder="1" value="{{old('dv_Tutor')}}" >
                </div>

                <div class="form-group">
                    <strong>Crea tu contraseña:</strong>
                    <input type="password" name="password_Tutor" class="form-control" placeholder="*******" value="{{old('password_Tutor')}}" >
                </div>

                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre_Tutor" class="form-control" placeholder="Nombre" value="{{old('nombre_Tutor')}}" >
                </div>

                <div class="form-group">
                    <strong>Apellido:</strong>
                    <input type="text" name="apellido_Tutor" class="form-control" placeholder="Apellido" value="{{old('apellido_Tutor')}}" >
                </div>

                <div class="form-group">
                    <strong>Correo:</strong>
                    <input type="text" name="correo_Tutor" class="form-control" placeholder="correo@ejemplo.com" value="{{old('correo_Tutor')}}" >
                </div>

                <div class="form-group">
                    <strong>Fecha de nacimiento:</strong>
                    <input type="date" name="fechaNac_Tutor" class="form-control" value="{{old('fechaNac_Tutor')}}">
                </div>

                <div class="form-group">
                    <strong>Numero de Teléfono:</strong>
                    <input type="text" name="telefono_Tutor" class="form-control" placeholder="+56912345678" value="{{old('telefono_Tutor')}}" >
                </div>

                <div class="form-group">
                    <strong>Comuna:</strong>
                    <select name="id_Comuna_Tutor" class="form-select" id="">
                        <option value="">-- Elige comuna --</option>
                        <option value="1">Viña del mar</option>
                        <option value="2">Casablanca</option>
                        <option value="3">Concón</option>
                        <option value="4">Juan Fernández</option>
                        <option value="5">Puchuncaví</option>
                        <option value="6">Quintero</option>
                        <option value="7">Valparaíso</option>
                    </select>
                </div>
                <div class="form-group">
                    <strong>Fotocopia carnet:</strong>
                    <input type="file" name="fotocopiacarnet_Tutor" class="form-control" placeholder="--Ingresa el documento--" value="{{old('fotocopiacarnet_Tutor')}}" accept=".pdf">
                </div>

                <div class="form-group">
                    <strong>Registro social:</strong>
                    <input type="file" name="registrosocial_Tutor" class="form-control" placeholder="--Ingresa el documento--" value="{{old('registrosocial_Tutor')}}" accept=".pdf">
                </div>
        
                <div class="form-group">
                    <input type="text" name="id_Rol_Tutor" class="form-control" placeholder="" value="1" hidden >
                </div>

                <div class="form-group">
                    <input type="text" name="estado_Tutor" class="form-control" placeholder="" value="1" hidden >
                </div>

            <div id="botonCrear" class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
@endsection