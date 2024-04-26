@extends('layouts.layoutpersonal')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Agregar Insumo</h2>
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

    <form action="{{route('insumos.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre_Insumo" class="form-control" placeholder="Nombre ejemplo" value="{{old('nombre_Insumo')}}" >
                </div>
                <div class="form-group">
                    <strong>Cantidad:</strong>
                    <input type="text" name="cantidad_Insumo" class="form-control" placeholder="10" value="{{old('cantidad_Insumo')}}">
                </div>
                <div class="form-group">
                    <strong>Costo Unitario</strong>
                    <input type="text" name="costo_Insumo" class="form-control" placeholder="14300" value="{{old('costo_Insumo')}}">
                </div>
                <div class="form-group">
                    <input type="text" name="estado_Insumo" class="form-control" placeholder="" value="0" hidden>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
@endsection