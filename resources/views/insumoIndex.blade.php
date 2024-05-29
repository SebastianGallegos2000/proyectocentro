

@extends('layouts.layoutpersonal')
@section('title','Home')
@section('content')

</div>
<div class="container" id="container-user">
    <div class="row" id="container-text">
        <div class="col-sm-3">
            <h4>
                Insumos
            </h4>
        </div>

            <div class="row">
                <div class="col-sm-8">
                    <div>
                        <a href="/insumo/create" class="btn btn-info">Agregar Insumo</a>
                    </div>
                </div>
                    @if(Session::get('success'))
                    <div class="alert alert-success mt-2">
                        <strong>{{Session::get('success')}}</strong>
                    </div>
                    @endif
            </div>
        
    <div class="container p-5 my-5 border">
        <table id="table-insumos" class="display responsive nowrap" width="100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Cantidad Disponible</th>
                <th>Costo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($insumos as $insumo)
            <tr>

                <td class="fw-bold">{{$insumo->id}}</td>
                <td>{{$insumo->nombre_Insumo}}</td>
                <td>{{$insumo->cantidad_Insumo}}</td>
                <td>{{$insumo->costo_Insumo}}</td>
                <td>{{$insumo->estado_Insumo }}</td>
                <td>
                    <!--<a href="" class="btn btn-danger">Agregar</a>-->
                    <a href="insumo/{{$insumo->id}}/edit" class="btn btn-dark">Editar</a>
                    <!--<form action="" method="post" class="d-inline">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>-->
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
        <script>
            $(document).ready( function () { //cambia el idioma a español
                
                $('#table-insumos').DataTable({
                    language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                }
                });
            } );
        </script>
    </div>
</div>

</html>
@endsection