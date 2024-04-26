@extends('layouts.layout')

@section('title','Log In Personal')


@section('content')
<div class="login-container">
    <div class="container-box">
        <div class="box">
            <img id="iconoLogin" src="/img/iconopersonal.png" alt="">
            <h2 id="txt-iniciarSesion">Iniciar sesión</h2>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="usernamepersonal"><i class="fas fa-user"></i> Usuario:</label>
                    <input type="text" id="usernamepersonal" name="usernamepersonal">
                </div>
                <div class="form-group">
                    <label for="passwordpersonal"><i class="fas fa-lock"></i> Contraseña:</label>
                    <input type="password" id="passwordpersonal" name="passwordpersonal">
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