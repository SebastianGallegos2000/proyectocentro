@extends('layouts.layoutadmin')

@section('content')
<div class="container" id="container-user">
    <div class="row" id="container-text">
        <div class="col-sm-4">
        <div>
            <h4>Agregar Tipo de Atención</h4>
        </div>
        <div>
            <a href="{{route('tipoAtencionIndex')}}" class="btn btn-primary">Volver</a>
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

    <form action="{{route('storeTipoAtencion')}}" method="POST">
        @csrf
        <div class="container p-5">
            <div class="mb-3 row">
                <div class="mb-3">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre_TipoAtencion" class="form-control" placeholder="Nombre ejemplo" value="{{old('nombre_TipoAtencion')}}" >
                </div>
                <div class="mb-3">
                    <input type="text" name="costo_TipoAtencion" class="form-control" placeholder="2500" value="{{old('costo_TipoAtencion')}}" >
                </div>
                <div class="mb-3">
                    <input type="text" name="estado_TipoAtencion" class="form-control" placeholder="" value="1" hidden>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
@endsection