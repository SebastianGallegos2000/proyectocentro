@extends('layouts.layouttutores')
@section('title','Crear Mascota')
@section('content')

<div class="container" id="container-user">
    <div class="row" id="container-text">
            <div class="col-12">
        <div>
            <h2>Crear Mascota</h2>
        </div>
        <div>
            <a href="{{route('privada')}}" class="btn btn-primary">Volver</a>
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



    <form action="{{route('storeMascota')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container p-4">
            <div class="mb-3 row">
                <div class="mb-3">
                    <input type="text" name="tutor_id" class="form-control" placeholder="11222333" maxlength="8" value="{{old('rut_Tutor', auth()->user()->id)}}" hidden >
                </div>

                <div class="mb-3">
                    <strong>Nombre Mascota:</strong>
                    <input type="text" name="nombre_Mascota" class="form-control" placeholder="Michu" value="{{old('nombre_Mascota')}}">
                </div>

                <div class="mb-3">
                    <strong>Raza de Mascota:</strong>
                    <select name="razamascota_id" class="form-select" id="">
                    <option value="">-- Elige Raza --</option>
                @foreach ($razamascotas as $razamascota)
                    <option value="{{$razamascota->id}}">{{$razamascota->nombre_Razamascota}}</option>
                @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <strong>Número de Chip:</strong>
                    <input type="text" name="nroChip_Mascota" class="form-control" placeholder="111111111111111" maxlength="15" value="{{old('nroChip_Mascota')}}" >
                </div>

                <div class="mb-3">
                    <strong>Peso de la Mascota:</strong>
                    <select name="peso_Mascota">
                        <option value="2">Entre 1 a 5 Kg</option>
                        <option value="8">Entre 6 y 14 Kg</option>
                        <option value="17">Entre 15 y 20 Kg</option>
                        <option value="25">Entre 21 y 34 Kg</option>
                        <option value="39">Entre 35 y 45 Kg</option>
                        <option value="0">No lo sé</option>
                    </select>                
                </div>

                <div class="mb-3">
                    <strong>Edad de la Mascota (Meses):</strong>
                    <input type="text" name="edad_Mascota" class="form-control" placeholder="5" value="{{old('edad_Mascota')}}" >
                </div>

                <div class="mb-3">
                    <strong>Especie de la Mascota:</strong>
                    <select name="especie_Mascota">
                        <option value="Gato">Gato</option>
                        <option value="Perro">Perro</option>
                    </select>
                </div>

                <div class="mb-3">
                    <strong>Sexo de la Mascota</strong>
                    <select name="sexo_Mascota">
                        <option value="Hembra">Hembra</option>
                        <option value="Macho">Macho</option>
                    </select>                
                </div>

                <div class="mb-3">
                    <input type="text" name="estado_Mascota" class="form-control" placeholder="" value="1" hidden >
                </div>

            <div id="botonCrear" class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
</html>
@endsection