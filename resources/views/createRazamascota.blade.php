@extends('layouts.layoutadmin')

@section('content')
<div class="container p-4">
    <div class="col-12">
        <div>
            <h2>Agregar Raza de Mascota</h2>
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

    <form action="{{route('razamascota.store')}}" method="POST">
        @csrf
        <div class="container p-4">
            <div class="mb-3 row">
                <div class="mb-3">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre_Razamascota" class="form-control" placeholder="Nombre ejemplo" value="{{old('nombre_Razamascota')}}" >
                </div>
                <div class="mb-3">
                    <input type="text" name="estado_Razamascota" class="form-control" placeholder="" value="1" hidden>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
@endsection