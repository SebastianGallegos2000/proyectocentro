@extends('layouts.layoutadmin')

@section('content')
<div class="container" id="container-user">
    <div class="row" id="container-text">
        <div class="col-sm-3">

        <div>
            <h4>Editar Insumo</h4>
        </div>
        <div>
            <a href="{{route('insumoIndexAdmin')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ha ocurrido un error </strong> Revisar los campos<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('updateInsumo',$insumo) }}" method="POST">
    @csrf
        <div class="container p-4">
            <div class="mb-3 row">

                <div class="mb-3">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre_Insumo" class="form-control" placeholder="Nombre ejemplo" value="{{$insumo->nombre_Insumo}}" >
                </div>
                <div class="mb-3">
                    <strong>Cantidad:</strong>
                    <input type="text" name="cantidad_Insumo" class="form-control" placeholder="10" value="{{$insumo->cantidad_Insumo}}">
                </div>
                <div class="mb-3">
                    <strong>Costo Unitario</strong>
                    <input type="text" name="costo_Insumo" class="form-control" placeholder="14300" value="{{$insumo->costo_Insumo}}">
                </div>
                <div class="mb-3">
                    <input type="text" name="costo_Insumo" class="form-control" placeholder="14300" hidden value="1">
                </div>
                
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection