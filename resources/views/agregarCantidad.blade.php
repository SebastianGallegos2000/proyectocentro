@extends('layouts.layoutpersonal')
@section('title','Insumos')
@section('content')

<div class="container" id="container-user">
    <div class="row" id="container-text">
        <h4>
            Modificar Cantidad
        </h4>
<h3>Recuerda que para restar inventario debes colocar el signo menos. Ejemplo: -5</h3>
<form action="{{ route('agregarCantidad', $insumo->id) }}" method="POST">
    @csrf
    <label for="cantidad">Modificar a agregar:</label>
    <input type="number" name="cantidad" id="cantidad" required>
    <button type="submit">Modificar Cantidad</button>
</form>
</div>
</div>
</html>
@endsection