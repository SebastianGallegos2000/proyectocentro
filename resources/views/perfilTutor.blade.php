@extends('layouts.layouttutores')
@section('title','Home')
@section('content')


<div class="container" id="container-user">
    <div class="row" id="container-text">
        <h4>
            Datos de {{ auth()->user()->persona->nombre_Persona}}
        </h4>
        <div class="row">
                @if(Session::get('success'))
                <div class="alert alert-success mt-2">
                    <strong>{{Session::get('success')}}</strong>
                </div>
                @endif
        </div>
        <div class="row">
            <div>
                <strong>Rut</strong>
            </div>
            <div class="col-sm" id="user-perfil">
                <label id="dato">{{ auth()->user()->persona->rut_Persona }}</label>
            </div>
        </div>
        
        <div class="row">
            <div>
                <strong>Nombre</strong>
            </div>
            <div class="col-sm" id="user-perfil">
                <label id="dato">{{ auth()->user()->persona->nombre_Persona}}</label>
            </div>
        </div>
        <div class="row">
            <div>
                <strong>Apellido</strong>
            </div>
            <div class="col-sm" id="user-perfil">
                <label id="dato">{{ auth()->user()->persona->apellido_Persona }}</label>
            </div>
        </div>

        <div class="row">
            <div>
                <strong>Correo electrónico</strong>
            </div>
            <div class="col-sm" id="user-perfil">
                <label id="dato">{{ auth()->user()->persona->correo_Persona }}</label>
            </div>
        </div>

        <div class="row">
            <div>
                <strong>Fecha de Nacimiento</strong>
            </div>
            <div class="col-sm" id="user-perfil">
                <label id="dato">{{ \Carbon\Carbon::parse(auth()->user()->persona->fechaNac_Persona)->format('d-m-Y') }}</label>
            </div>
        </div>
        <div class="row">
            <div>
                <strong>Teléfono</strong>
            </div>
            <div class="col-sm" id="user-perfil">
                <label id="dato">{{ auth()->user()->persona->telefono_Persona }}</label>
            </div>
        </div>
        <div class="row">
            <div>
                <strong>Fotocopia de Carnet</strong>
            </div>
            <div class="col-sm" id="user-perfil">
                <a href="{{ asset('storage/fotocopiacarnet/' . auth()->user()->rut_Tutor .'_Fotocopia_Carnet.pdf') }}">Ver Fotocopia Carnet</a>
            </div>
        </div>
        <div class="row">
            <div>
                <strong>Registro Social</strong>
            </div>
            <div class="col-sm" id="user-perfil">
                <a href="{{ asset('storage/registrosocial/' . auth()->user()->rut_Tutor .'_Registro_Social.pdf') }}">Ver Registro Social</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div>
                    <a href="/tutor/{{auth()->user()->id}}/edit" class="btn btn-info" id="btn-editardato">Editar datos</a>
                </div>
            </div>
        </div>
    </div>
    </div>

</html>
@endsection