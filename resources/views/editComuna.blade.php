@extends('layouts.layoutadmin')

@section('content')
<div class="container p-4">
    <div class="col-12">
        <div>
            <h2>Editar Comuna</h2>
        </div>
        <div>
            <a href="/comunaIndex" class="btn btn-primary">Volver</a>
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

    <form action="{{ route('updateComuna',$comuna) }}" method="POST">
    @csrf
        <div class="container p-5">
            <div class="mb-3 row">

                <div class="mb-3">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre_Comuna" class="form-control" placeholder="Nombre ejemplo" value="{{$comuna->nombre_Comuna}}" >
                </div>
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input type="hidden" name="estado_Comuna" value="0">
                        <input class="form-check-input" type="checkbox" name="estado_Comuna" id="flexSwitchCheckChecked" {{ $comuna->estado_Comuna ? 'checked' : '' }} value="1">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Estado</label>
                    </div>
                </div>
                
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection