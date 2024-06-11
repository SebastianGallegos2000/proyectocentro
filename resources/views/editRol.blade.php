@extends('layouts.layoutadmin')

@section('content')
<div class="container" id="container-user">
    <div class="row" id="container-text">
        <div class="col-sm-3">
        <div>
            <h4>Editar Rol</h4>
        </div>
        <div>
            <a href="/rolesIndex" class="btn btn-primary">Volver</a>
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

    <form action="{{ route('updateRol', $role) }}" method="POST">
    @csrf
    <div class="container p-5">
        <div class="mb-3 row">

                <div class="mb-3">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre_Rol" class="form-control" placeholder="Nombre ejemplo" value="{{$role->nombre_Rol}}" >
                </div>
                <div class="form-check form-switch">
                    <input type="hidden" name="estado_Rol" value="0">
                    <input class="form-check-input" type="checkbox" name="estado_Rol" id="flexSwitchCheckChecked" {{ $role->estado_Rol ? 'checked' : '' }} value="1">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Estado</label>
                </div>
                
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection