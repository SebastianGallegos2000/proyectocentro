@extends('layouts.layoutadmin')

@section('content')
<div class="container" id="container-user">
    <div class="row" id="container-text">
        <div class="col-sm-4">
        <div>
            <h4>Editar Raza de mascota</h4>
        </div>
        <div>
            <a href="/razamascotaIndex" class="btn btn-primary">Volver</a>
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

    <form action="{{ route('updateRazaMascota',$razamascotum) }}" method="POST">
    @csrf
        <div class="container p-4">
            <div class="mb-3 row">

                <div class="mb-3">
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