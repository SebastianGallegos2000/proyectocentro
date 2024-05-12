@extends('layouts.layoutadmin')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Editar Comuna</h2>
        </div>
        <div>
            <a href="/comunas" class="btn btn-primary">Volver</a>
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

    <form action="{{ route('comunas.update',$comunas) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">

                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre_Comunas" class="form-control" placeholder="Nombre ejemplo" value="{{$comunas->nombre_Comunas}}" >
                </div>
                <div class="form-check form-switch">
                    <input type="hidden" name="estado_Comunas" value="0">
                    <input class="form-check-input" type="checkbox" name="estado_Comunas" id="flexSwitchCheckChecked" {{ $comunas->estado_Comunas ? 'checked' : '' }} value="1">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Estado</label>
                </div>
                
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection