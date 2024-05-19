@extends('layouts.layoutadmin')
@section('title','Usuarios')
@section('content')


<div class="row">
    <div class="col-sm-3">
        <h4>
            Usuarios del sistema
        </h4>
    </div>
    <div class="row">
    <div class="col-sm-3">
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
            <th>Contraseña</th>
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
        @foreach ($personal as $personal)
        <tr>

            <td class="fw-bold">{{$personal->rut_Personal}}</td>
            <td>{{$personal->password_Personal}}</td>
            <td>{{$personal->nombre_Personal}}</td>
            <td>{{$personal->apellido_Personal}}</td>
            <td>{{$personal->correo_Personal}}</td>
            <td>{{ \Carbon\Carbon::parse($personal->fechaNac_Personal)->format('d-m-Y') }}</td>
            <td>{{$personal->telefono_Personal}}</td>
            <td>{{$personal->id_Especialidad_Personal}}</td>
            <td>{{$personal->estado_Personal }}</td>
            <td>
                <!--<a href="" class="btn btn-danger">Agregar</a>-->
                <a href="personal/{{$personal->rut_Personal}}/edit" class="btn btn-dark">Editar</a>
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
        <th>Contraseña</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Fecha de Nacimiento</th>
        <th>Telefono</th>
        <th>Comuna</th>
        <th>Fotocopia de Carnet</th>
        <th>Registro social</th>
        <th>Estado</th>
        <th>Acciones</th>

    </tr>
</thead>
<tbody>
    @foreach ($tutores as $tutor)
    <tr>

        <td class="fw-bold">{{$tutor->rut_Tutor}}</td>
        <td>{{$tutor->password_Tutor}}</td>
        <td>{{$tutor->nombre_Tutor}}</td>
        <td>{{$tutor->apellido_Tutor}}</td>
        <td>{{$tutor->correo_Tutor}}</td>
        <td>{{ \Carbon\Carbon::parse($tutor->fechaNac_Tutor)->format('d-m-Y') }}</td>
        <td>{{$tutor->telefono_Tutor}}</td>
        <td>{{ $tutor->comuna ? $tutor->comuna->nombre_Comuna : 'N/A' }}</td>
        <td><a href="{{ asset('storage/fotocopiacarnet/' . $tutor->rut_Tutor .'_Fotocopia_Carnet.pdf') }}">Ver Fotocopia Carnet</a></td>
        <td><a href="{{ asset('storage/registrosocial/' . $tutor->rut_Tutor .'_Registro_Social.pdf') }}">Ver Registro Social</a></td>
        <td>{{$tutor->estado_Tutor }}</td>



        <td>
            <!--<a href="" class="btn btn-danger">Agregar</a>-->
            <a href="tutor/{{$tutor->rut_Tutor}}/edit" class="btn btn-dark">Editar</a>
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