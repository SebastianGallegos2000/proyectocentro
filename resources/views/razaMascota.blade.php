@extends('layouts.layoutadmin')
@section('title','RazaMascota')
@section('content')


<div class="container-user">
    <div class="container-text">
        <h4>
            Razas de Mascotas
        </h4>


        <div class="row">
<div class="col-12">
    <div>
        <a href="razamascota/create" class="btn btn-info">Agregar Raza</a>
    </div>
</div>
@if(Session::get('success'))
<div class="alert alert-success mt-2">
    <strong>{{Session::get('success')}}</strong>
</div>
@endif
<div class="col-12 mt-4">
    <table id="table-pets" class="table table-bordered text-white">
        <tr class="text-secondary">
            <th>ID</th>
            <th>Nombre Raza</th>
            <th>Estado</th>
            <th>Botones</th>

        </tr>
        @foreach ($razaMascotas as $razaMascota)
        <tr>

            <td class="fw-bold">{{$razaMascota->id_Razamascota}}</td>
            <td>{{$razaMascota->nombre_Razamascota}}</td>
            <td>{{$razaMascota->estado_Razamascota }}</td>
            <td>
                <!--<a href="" class="btn btn-danger">Agregar</a>-->
                <a href="razamascota/{{$razaMascota->id_Razamascota}}/edit" class="btn btn-dark">Editar</a>
                <!--<form action="" method="post" class="d-inline">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>-->
            </td>
        </tr>
        @endforeach

    </table>
    {{$razaMascotas->links()}}
</div>


</html>
@endsection