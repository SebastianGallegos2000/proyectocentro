@extends('layouts.layoutadmin')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Editar Raza de mascota</h2>
        </div>
        <div>
            <a href="/razamascota" class="btn btn-primary">Volver</a>
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

    <form action="{{ route('razamascota.update',$razamascotum) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">

                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre_Razamascota" class="form-control" placeholder="Nombre ejemplo" value="{{$razamascotum->nombre_Razamascota}}" >
                </div>
                <div class="form-check form-switch">
                    <input type="hidden" name="estado_Razamascota" value="0">
                    <input class="form-check-input" type="checkbox" name="estado_Razamascota" id="flexSwitchCheckChecked" {{ $razamascotum->estado_Razamascota ? 'checked' : '' }} value="1">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Estado</label>
                </div>
                
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection