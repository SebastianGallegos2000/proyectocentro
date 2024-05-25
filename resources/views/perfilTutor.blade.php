@extends('layouts.layouttutores')
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
                    <a href="#" class="btn btn-info">Editar datos</a>
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
                <strong>Fotocopia Carnet</strong>
                <a href="{{ asset('storage/fotocopiacarnet/' . auth()->user()->rut_Tutor .'_Fotocopia_Carnet.pdf') }}">Ver Fotocopia Carnet</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm" id="user-perfil">
                <strong>Registro Social</strong>
                <a href="{{ asset('storage/registrosocial/' . auth()->user()->rut_Tutor .'_Registro_Social.pdf') }}">Ver Registro Social</a>
            </div>
        </div>
    </div>
    </div>

</html>
@endsection