<!DOCTYPE html>
<html>
<head>
    <title>Historial de Atenciones</title>
    <style>
        /* Aquí puedes agregar estilos CSS para formatear tu PDF */
    </style>
</head>
<body>
    <h1>Historial de Atenciones de {{ $mascota->nombre }}</h1>

    @foreach ($atenciones as $atencion)
        <h2>Atención {{ $atencion->id }}</h2>
        <p>Fecha: {{ $atencion->fecha }}</p>
        <p>Descripción: {{ $atencion->descripcion }}</p>
        <!-- Agrega aquí más detalles sobre la atención -->
    @endforeach
</body>
</html>