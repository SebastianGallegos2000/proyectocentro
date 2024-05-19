@extends('layouts.layoutpersonal')

@section('content')
<div class="container p-4">
    <div class="col-12">
        <div>
            <h2>Editar Insumo</h2>
        </div>
        <div>
            <a href="/insumo" class="btn btn-primary">Volver</a>
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

    <form action="{{ route('insumo.update',$insumo) }}" method="POST">
    @csrf
    @method('PUT')
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
                <div class="form-check form-switch">
                    <input type="hidden" name="estado_Insumo" value="0">
                    <input class="form-check-input" type="checkbox" name="estado_Insumo" id="flexSwitchCheckChecked" {{ $insumo->estado_Insumo ? 'checked' : '' }} value="1">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Estado</label>
                </div>
                
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection