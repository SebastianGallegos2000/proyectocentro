
@extends('layouts.layoutpersonal')
@section('title','Insumos')
@section('content')

<div class="container" id="container-user">
    <div class="row" id="container-text">
        <div class="col-sm-3">
            <h4>
                Tutores
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
        <table id="table-tutores" class="display responsive nowrap" width="100%">
            <thead>
            <tr>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>F. de Nacimiento</th>
                <th>Teléfono</th>
                <th>Fotocopia de carnet</th>
                <th>Registro social</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tutores as $tutor)
                <tr>
                    <td class="fw-bold">{{$tutor->persona->rut_Persona}}</td>
                    <td>{{$tutor->persona->nombre_Persona}}</td>
                    <td>{{$tutor->persona->apellido_Persona}}</td>
                    <td>{{$tutor->persona->correo_Persona}}</td>
                    <td>{{ \Carbon\Carbon::parse($tutor->persona->fechaNac_Persona)->format('d-m-Y') }}</td>
                    <td>{{$tutor->persona->telefono_Persona}}</td>
                    <td><a href="{{ asset('storage/fotocopiacarnet/' . $tutor->persona->rut_Persona .'_Fotocopia_Carnet.pdf') }}">Ver Fotocopia Carnet</a></td>
                    <td><a href="{{ asset('storage/registrosocial/' . $tutor->persona->rut_Persona .'_Registro_Social.pdf') }}">Ver Registro Social</a></td>
                    <td class="d-flex flex-wrap justify-content-start">
                    <a href="" class="btn btn-dark mr-2 mb-2" id="boton-accion">MASCOTAS</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
        <script>
            $(document).ready( function () { //cambia el idioma a español
                
                $('#table-tutores').DataTable({
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