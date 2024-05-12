@extends('layouts.layoutadmin')
@section('title','Comuna')
@section('content')


<div class="container-user">
    <div class="container-text">
        <h4>
            Comunas
        </h4>


        <div class="row">
<div class="col-12">
    <div>
        <a href="comunas/create" class="btn btn-info">Agregar Comuna</a>
    </div>
</div>
@if(Session::get('success'))
<div class="alert alert-success mt-2">
    <strong>{{Session::get('success')}}</strong>
</div>
@endif
<div class="col-12 mt-4">
    <table id="table" class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre comuna</th>
                <th scope="col">Estado</th>
                <th scope="col">Botones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($comunas as $comuna)
            <tr>
                <td>{{$comuna->id_Comuna}}</td>
                <td>{{$comuna->nombre_Comuna}}</td>
                <td>{{$comuna->estado_Comuna }}</td>
                <td>
                    <a href="comunas/{{$comuna->id_Comuna}}/edit" class="btn btn-dark">Editar</a>
                    <!--<form action="" method="post" class="d-inline">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>-->
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$comunas->links()}}
</div>


</html>
@endsection