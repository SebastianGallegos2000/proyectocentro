
@extends('layouts.layoutpersonal')
@section('title','Mascotas')
@section('content')

<div class="container" id="container-user">
    <div class="row" id="container-text">
        <div class="col-sm-3">
            <h4>
                Mascotas
            </h4>
        </div>

            <div class="row">
                    @if(Session::get('success'))
                    <div class="alert alert-success mt-2">
                        <strong>{{Session::get('success')}}</strong>
                    </div>
                    @endif
            </div>
        
    <div class="container p-5 my-5 border">
        <table id="table-mascotas" class="display responsive nowrap" width="100%">
            <thead>
            <tr>
                <th>Nro de Chip</th>
                <th>Nombre</th>
                <th>Especie</th>
                <th>Raza</th>
                <th>Peso (Kg)</th>
                <th>Edad (Semanas)</th>
                <th>Sexo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mascotas as $mascota)
                <tr>

                <td class="fw-bold">{{$mascota->nroChip_Mascota}}</td>
                <td>{{$mascota->nombre_Mascota}}</td>
                <td>{{$mascota->especie_Mascota}}</td>
                <td>{{$mascota->razamascota ? $mascota->razamascota->nombre_Razamascota : 'N/A'}}</td>                
                <td>{{$mascota->peso_Mascota}}</td>
                <td>{{$mascota->edad_Mascota}}</td>
                <td>{{$mascota->sexo_Mascota}}</td>

                <td class="d-flex flex-wrap justify-content-start">
                    <a href="" class="btn btn-dark mr-2 mb-2" id="boton-accion">ATENDER</a>
                    <a href="" class="btn btn-danger mr-2 mb-2" id="boton-accion">PDF</a>
                    <a href="" class="btn btn-warning mr-2 mb-2" id="boton-accion">👁</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
        <script>
            $(document).ready( function () { //cambia el idioma a español
                
                $('#table-mascotas').DataTable({
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