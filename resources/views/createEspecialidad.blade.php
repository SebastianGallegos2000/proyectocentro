@extends('layouts.layoutadmin')

@section('content')
<div class="container p-4">
    <div class="col-12">
        <div>
            <h2>Agregar Especialidad</h2>
        </div>
        <div>
            <a href="/especialidad" class="btn btn-primary">Volver</a>
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

    <form action="{{route('storeEspecialidad')}}" method="POST">
        @csrf
        <div class="container p-5">
            <div class="mb-3 row">
                <div class="mb-3">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre_Especialidad" class="form-control" placeholder="Nombre ejemplo" value="{{old('nombre_Especialidad')}}" >
                </div>
                <div class="mb-3">
                    <input type="text" name="estado_Especialidad" class="form-control" placeholder="" value="1" hidden>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
@endsection