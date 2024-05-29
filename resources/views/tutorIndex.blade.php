@extends('layouts.layouttutores')
@section('title','Home')
@section('content')

    <div class="container" id="container-user">
        <div class="row" id="container-text">
            <h4>
                Datos del usuario
            </h4>


            <div class="col-sm" id="user-1">
                <label id="dato">{{ auth()->user()->persona->rut_Persona }}</label>
            </div>
            <div class="col-sm" id="user-1">
                <label id="dato">{{ auth()->user()->persona->nombre_Persona}}</label>
            </div>
            <div class="col-sm" id="user-1">
                <label id="dato">{{ auth()->user()->persona->apellido_Persona }}</label>
            </div>
            <div class="col-sm" id="user-1">
                <label id="dato">{{ auth()->user()->persona->correo_Persona }}</label>
            </div>
            <div class="col-sm" id="user-1">
                <label id="dato">{{ \Carbon\Carbon::parse(auth()->user()->persona->fechaNac_Persona)->format('d-m-Y') }}</label>
            </div>
            <div class="col-sm" id="user-1">
                <label id="dato">{{ auth()->user()->persona->telefono_Persona }}</label>
            </div>
        </div>
        </div>

    </div>
    <div class="container" id="container-user">
        <div class="row" id="container-text">
            <h4>
                Mascotas
            </h4>
            <div class="row">
                <div class="col-sm">
                    <div>
                        <a href="{{route('createMascota')}}" class="btn btn-info">Agregar Mascota</a>
                    </div>
                </div>

                <div class="container p-5 my-5 border">
                    <table id="table-mascota" class="display responsive nowrap" width="100%">
                        <thead>
                            <tr>
                                <th>Nombre Mascota</th>
                                <th>Especie</th>
                                <th>Botones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mascotas as $mascota)
                            <tr>
                                <td>{{$mascota->nombre_Mascota}}</td>
                                <td>{{$mascota->especie_Mascota}}</td>
                                <td class="d-flex flex-wrap justify-content-start">
                                    <a href="" class="btn btn-dark mr-2 mb-2" id="boton-accion">AGENDAR HORA</a>
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
                            
                            $('#table-mascota').DataTable({
                                language: {
                                url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                                
                            }
                            });
                        } );
                    </script>
                </div>

</html>
@endsection