

@extends('layouts.layoutpersonal')
@section('title','Home')
@section('content')

</div>

<div class="container-user">
    <div class="container-text">
        <h4>
            Insumos
        </h4>


        <div class="row">
<div class="col-12">
    <div>
        <a href="/insumo/create" class="btn btn-info">Agregar Insumo</a>
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
            <th>Nombre</th>
            <th>Cantidad Disponible</th>
            <th>Costo</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        @foreach ($insumos as $insumo)
        <tr>

            <td class="fw-bold">{{$insumo->id_Insumo}}</td>
            <td>{{$insumo->nombre_Insumo}}</td>
            <td>{{$insumo->cantidad_Insumo}}</td>
            <td>{{$insumo->costo_Insumo}}</td>
            <td>{{$insumo->estado_Insumo }}</td>
            <td>
                <!--<a href="" class="btn btn-danger">Agregar</a>-->
                <a href="insumo/{{$insumo->id_Insumo}}/edit" class="btn btn-dark">Editar</a>
                <!--<form action="" method="post" class="d-inline">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>-->
            </td>
        </tr>
        @endforeach

    </table>
    {{$insumos->links()}}
</div>

</html>
@endsection