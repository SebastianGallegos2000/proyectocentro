@extends('layouts.layoutadmin')
@section('title','Usuarios')
@section('content')


<div class="container" id="container-user">
    <div class="row" id="container-text">
        <div class="col-sm-3">
            <h4>
                Usuarios del sistema
            </h4>
        </div>

    <div class="row">
    <div class="col-sm-8">
        <h4>
            Personal
        </h4>
    </div>
    </div>

        <div class="row">
            <div class="col-sm-8">
                <div>
                    <a href="personal/create" class="btn btn-info">Agregar Personal</a>
                </div>
            </div>
                @if(Session::get('success'))
                <div class="alert alert-success mt-2">
                    <strong>{{Session::get('success')}}</strong>
                </div>
                @endif
        </div>
    
<div class="container p-2 my-5 border">
    <table id="table-personal" class="display responsive nowrap" width="100%">
        <thead>
        <tr>
            <th>Rut</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Fecha de Nacimiento</th>
            <th>Telefono</th>
            <th>Especialidad</th>
            <th>Estado</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($personales as $personal)
        <tr>

            <td class="fw-bold">{{$personal->persona->rut_Persona}}</td>
            <td>{{$personal->persona->nombre_Persona}}</td>
            <td>{{$personal->persona->apellido_Persona}}</td>
            <td>{{$personal->persona->correo_Persona}}</td>
            <td>{{ \Carbon\Carbon::parse($personal->persona->fechaNac_Persona)->format('d-m-Y') }}</td>
            <td>{{$personal->persona->telefono_Persona}}</td>
            <td>{{$personal->especialidad->nombre_Especialidad}}</td>
            
            <td>{{$personal->persona->estado_Persona }}</td>
            <td>
                <!--<a href="" class="btn btn-danger">Agregar</a>-->
                <a href="personal/{{$personal->id}}/editPersonalAdmin" class="btn btn-dark">Editar</a>
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
            
            $('#table-personal').DataTable({
                language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                
            }
            });
        } );
    </script>
</div>

<div class="col-sm-3">
    <h4>
        Tutores
    </h4>
</div>

    <div class="row">
        <div class="col-sm-8">
            <div>
                <a href="tutor/create" class="btn btn-info">Agregar Tutores</a>
            </div>
        </div>
            @if(Session::get('success'))
            <div class="alert alert-success mt-2">
                <strong>{{Session::get('success')}}</strong>
            </div>
            @endif
    </div>

<div class="container p-2 my-5 border">
<table id="table-tutor" class="display responsive nowrap" width="100%">
    <thead>
    <tr>
        <th>Rut</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Fecha de Nacimiento</th>
        <th>Telefono</th>
        <th>Fotocopia de Carnet</th>
        <th>Registro social</th>
        <th>Estado</th>
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
        <td>{{$tutor->persona->estado_Persona }}</td>



        <td>
            <!--<a href="" class="btn btn-danger">Agregar</a>-->
            <a href="tutor/{{$tutor->persona->id}}/editTutorAdmin" class="btn btn-dark">Editar</a>
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
        
        $('#table-tutor').DataTable({
            language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
            
        }
        });
    } );
</script>
</div>




</html>
@endsection