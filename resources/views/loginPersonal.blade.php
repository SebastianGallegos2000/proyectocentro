@extends('layouts.layout')

@section('title','Log In Personal')


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
            <img id="iconoLogin" src="/img/iconopersonal.png" alt="">
            <h2 id="txt-iniciarSesion">Iniciar sesión</h2>
            <form action="{{route('inicia-sesion-personal')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="usernamepersonal"><i class="fas fa-user"></i> Usuario:</label>
                    <input type="text" id="usernamepersonal" name="rut_Persona">
                </div>
                <div class="form-group">
                    <label for="passwordpersonal"><i class="fas fa-lock"></i> Contraseña:</label>
                    <input type="password" id="passwordpersonal" name="password_Usuario">
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