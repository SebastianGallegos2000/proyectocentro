@extends('layouts.layout')

@section('title','Log In Tutores')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="login-container">
    <div class="container-box">
        <div class="box">
            <img id="iconoLogin" src="/img/pataperro.png" alt="">
            <h2 id="txt-iniciarSesion">Iniciar sesión</h2>
            <form action="{{route('inicia-sesion')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="usernametutor"><i class="fas fa-user"></i> Usuario:</label>
                    <input type="text" id="usernametutor" name="rut_Persona">
                </div>
                <div class="form-group">
                    <label for="passwordtutor"><i class="fas fa-lock"></i> Contraseña:</label>
                    <input type="password" id="passwordtutor" name="password_Usuario">
                </div>
                <div>
                <a href="{{route('registroTutor')}}">No tienes cuenta? Créala aquí</a>
                </div>
                <div class="btn-conteiner">
                    <a href="/">
                <button id="btnCancelarSesion" type="submit" class="btn">Cancelar</button>
                </a>
                <button id="btnIniciarSesion" type="submit" class="btn">Iniciar sesión</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection