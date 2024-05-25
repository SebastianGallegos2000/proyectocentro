@extends('layouts.layoutpersonal')
@section('title','Home')
@section('content')


<div class="container" id="container-user">
    <div class="row" id="container-text">
        <h4>
            Datos de {{ auth()->user()->persona->nombre_Persona}}
        </h4>
        <div class="row">
            <div class="col-sm-8">
                <div>
                    <a href="{{route('editPersonalView')}}" class="btn btn-info">Editar datos</a>
                </div>
            </div>
                @if(Session::get('success'))
                <div class="alert alert-success mt-2">
                    <strong>{{Session::get('success')}}</strong>
                </div>
                @endif
        </div>
        <div class="row">
            <div class="col-sm" id="user-perfil">
                <label id="dato">{{ auth()->user()->persona->rut_Persona }}</label>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm" id="user-perfil">
                <label id="dato">{{ auth()->user()->persona->nombre_Persona}}</label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm" id="user-perfil">
                <label id="dato">{{ auth()->user()->persona->apellido_Persona }}</label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm" id="user-perfil">
                <label id="dato">{{ auth()->user()->persona->correo_Persona }}</label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm" id="user-perfil">
                <label id="dato">{{ \Carbon\Carbon::parse(auth()->user()->persona->fechaNac_Persona)->format('d-m-Y') }}</label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm" id="user-perfil">
                <label id="dato">{{ auth()->user()->persona->telefono_Persona }}</label>
            </div>
        </div>
        <div class="row">
            <div class="col-sm" id="user-perfil">
                <label id="dato">
                @if(auth()->user()->persona->personal)
                    {{ auth()->user()->persona->personal->especialidad->nombre_Especialidad }}
                @else
                    <!-- Maneja el caso en que el personal no existe -->
                    No disponible
                @endif</label>
            </div>
        </div>

    </div>
    </div>

</html>
@endsection