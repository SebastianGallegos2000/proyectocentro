@extends('layouts.layouttutores')
@section('title','Home')
@section('content')

    <div class="container-user">
        <div class="container-text">
            <h4>
                Datos del usuario
            </h4>
        </div>
        <div class="container-info">
            <div class="user-1">
                11.111.111-1
            </div>
            <div class="user-1">
                Nombre
            </div>
            <div class="user-1">
                Apellido
            </div>
            <div class="user-1">
                Correo@ejemplo.com
            </div>
            <div class="user-1">
                Fecha/Nacimiento/Tutor
            </div>
            <div class="user-1">
                +56911111111
            </div>
        </div>

    </div>
    <div class="container-user">
        <div class="container-text">
            <h4>
                Mascotas
            </h4>
            <div class="row">
    <div class="col-12">
        <div>
            <a href="mascota/create" class="btn btn-info">Agregar Mascota</a>
        </div>
    </div>

    <div class="col-12 mt-4">
        <table id="table-pets" class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>Especie</th>
                <th>Nombre Mascota</th>
                <th>Acción</th>
            </tr>
            <tr>
                <td class="fw-bold">ÍCONO DE MASCOTA (GATO O PERRO)</td>
                <td>Nombre MASCOTA</td>
                <td>
                    <a href="" class="btn btn-danger">PDF</a>
                    <a href="" class="btn btn-dark">AGENDAR HORA</a>
                    <a href="" class="btn btn-warning">👁</a>
                    <form action="" method="post" class="d-inline">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        </table>
    </div>

</html>
@endsection