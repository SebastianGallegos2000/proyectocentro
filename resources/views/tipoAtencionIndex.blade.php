@extends('layouts.layoutadmin')
@section('title','Comuna')
@section('content')


<div class="container" id="container-user">
    <div class="row" id="container-text">
        <div class="col-sm-3">
            <h4>
                Tipo Atenciones
            </h4>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div>
                    <a href="/tipoAtencion/create" class="btn btn-info">Agregar Tipo Atencion</a>
                </div>
            </div>
                @if(Session::get('success'))
                <div class="alert alert-success mt-2">
                    <strong>{{Session::get('success')}}</strong>
                </div>
                @endif
        </div>

    <div class="container p-5 my-5 border">
        <table id="table-atenciones" class="display responsive nowrap" width="100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Botones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($tipoatenciones as $tipoatencion)
                <tr>
                    <td>{{$tipoatencion->id}}</td>
                    <td>{{$tipoatencion->nombre_TipoAtencion}}</td>
                    <td>{{$tipoatencion->costo_TipoAtencion}}</td>
                    <td>{{$tipoatencion->estado_TipoAtencion }}</td>
                    <td>
                        <a href="tipoAtencion/{{$tipoatencion->id}}/edit" class="btn btn-dark">Editar</a>
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
                
                $('#table-atenciones').DataTable({
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