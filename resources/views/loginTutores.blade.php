@extends('layouts.layout')

@section('title','Log In Tutores')


@section('content')
<div class="login-container">
    <div class="container-box">
        <div class="box">
            <img id="iconoLogin" src="/img/pataperro.png" alt="">
            <h2 id="txt-iniciarSesion">Iniciar sesión</h2>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="usernametutor"><i class="fas fa-user"></i> Usuario:</label>
                    <input type="text" id="usernametutor" name="usernametutor">
                </div>
                <div class="form-group">
                    <label for="passwordtutor"><i class="fas fa-lock"></i> Contraseña:</label>
                    <input type="password" id="passwordtutor" name="passwordtutor">
                </div>
                <div>
                <a href="/tutor/create">No tienes cuenta? Créala aquí</a>
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