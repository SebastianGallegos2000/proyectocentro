@extends('layouts.layoutpersonal')
@section('title','Home')
@section('content')

    <div class="container" id="container-user">
        <div class="row" id="container-text">
            <h4>
                Datos del usuario
            </h4>


            <div class="col-sm" id="user-1">
                <label id="dato">{{ auth()->user()->persona->rut_Persona }}</label>
            </div>
            <div class="col-sm" id="user-1">
                <label id="dato">{{ auth()->user()->persona->nombre_Persona}}</label>
            </div>
            <div class="col-sm" id="user-1">
                <label id="dato">{{ auth()->user()->persona->apellido_Persona }}</label>
            </div>
            <div class="col-sm" id="user-1">
                <label id="dato">{{ auth()->user()->persona->correo_Persona }}</label>
            </div>
            <div class="col-sm" id="user-1">
                <label id="dato">{{ \Carbon\Carbon::parse(auth()->user()->persona->fechaNac_Persona)->format('d-m-Y') }}</label>
            </div>
            <div class="col-sm" id="user-1">
                <label id="dato">{{ auth()->user()->persona->telefono_Persona }}</label>
            </div>
        </div>
    </div>

    <div class="container" id="container-user">
        <div class="row" id="container-text">
            <h4>
                Insumos Medicos
            </h4>
        </div>

    </div>
</html>
@endsection