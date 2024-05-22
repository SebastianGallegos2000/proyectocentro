@extends('layouts.layoutadmin')
@section('title','Especialidades')
@section('content')


<div class="row">
    <div class="col-sm-3">
        <h4>
            Especialidades
        </h4>
    </div>
        <div class="row">
            <div class="col-sm-8">
                <div>
                    <a href="especialidad/create" class="btn btn-info">Agregar Especialidad</a>
                </div>
            </div>
                @if(Session::get('success'))
                <div class="alert alert-success mt-2">
                    <strong>{{Session::get('success')}}</strong>
                </div>
                @endif
        </div>
    
    <div class="container p-5 my-5 border">
        <table id="table-especialidad" class="display responsive nowrap" width="100%">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Especialidad</th>
                <th scope="col">Estado</th>
                <th scope="col">Botones</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($especialidades as $especialidad)
            <tr>

                <td class="fw-bold">{{$especialidad->id_Especialidad}}</td>
                <td>{{$especialidad->nombre_Especialidad}}</td>
                <td>{{$especialidad->estado_Especialidad }}</td>
                <td>
                    <!--<a href="" class="btn btn-danger">Agregar</a>-->
                    <a href="especialidad/{{$especialidad->id_Especialidad}}/edit" class="btn btn-dark">Editar</a>
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
                
                $('#table-especialidad').DataTable({
                    language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                }
                });
            } );
        </script>
</div>


</html>
@endsection