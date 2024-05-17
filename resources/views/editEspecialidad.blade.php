@extends('layouts.layoutadmin')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Editar Especialidad</h2>
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

    <form action="{{ route('especialidad.update',$especialidad) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">

                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre_Especialidad" class="form-control" placeholder="Nombre ejemplo" value="{{$especialidad->nombre_Especialidad}}" >
                </div>
                <div class="form-check form-switch">
                    <input type="hidden" name="estado_Especialidad" value="0">
                    <input class="form-check-input" type="checkbox" name="estado_Especialidad" id="flexSwitchCheckChecked" {{ $especialidad->estado_Especialidad ? 'checked' : '' }} value="1">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Estado</label>
                </div>
                
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection