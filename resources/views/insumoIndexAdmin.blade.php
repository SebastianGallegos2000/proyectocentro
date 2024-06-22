@extends('layouts.layoutadmin')
@section('title','Insumos')
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
                        <a href="{{route('createInsumoAdmin')}}" class="btn btn-info">Agregar Insumo</a>
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
                <th>Stock Critico</th>
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
                <td>{{$insumo->stockCritico_Insumo}}</td>
                <td>{{$insumo->costo_Insumo}}</td>
                <td>{{$insumo->estado_Insumo }}</td>
                <td>
                    @if ($insumo->estado_Insumo == 0)
                        <a href="insumo/{{$insumo->id}}/activateAdmin" class="btn btn-success">Activar</a>
                    @elseif ($insumo->estado_Insumo == 1)
                        <a href="insumo/{{$insumo->id}}/editInsumoAdmin" class="btn btn-dark" >Editar</a>
                        <form action="{{ route('destroyInsumoAdmin', $insumo->id) }}"  method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de que desea eliminar este insumo?')">Eliminar</button>
                        </form>                    
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
        <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>
        <script>
            $(document).ready( function () { //cambia el idioma a español
                
                $('#table-insumos').DataTable({
                    responsive:true,
                    language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json'
                },
                columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 2, targets: 6 }
                ]
                    
                });
            } );
        </script>
    </div>
</div>

</html>
@endsection