<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cita Cancelada</title>
    <!-- Asegúrate de tener Bootstrap incluido en tu proyecto -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Cita Cancelada</h1>
            <p class="lead">La cita para la mascota <strong>{{ $solicitud->mascota->nombre_Mascota }}</strong> ha sido cancelada.</p>
            <hr class="my-4">
            <p>A continuación, los detalles de la solicitud cancelada:</p>
            <ul>
                <li>Fecha de la cita: {{ $solicitud->fecha_SolicitudCita }}</li>
                <li>Hora de la cita: {{ $solicitud->horaInicio_SolicitudCita }}</li>
                <li>Servicio solicitado: {{ $solicitud->tipoatencion->nombre_TipoAtencion }}</li>
                <li>Nombre del tutor: {{ $solicitud->mascota->tutor->persona->nombre_Persona }} {{$solicitud->mascota->tutor->persona->apellido_Persona}}</li>
                <li>Contacto del tutor: {{ $solicitud->mascota->tutor->persona->telefono_Persona }}</li>
            </ul>
            <p>Si necesita más información, por favor contáctenos al +569 1234 5678.</p>
        </div>
    </div>
</body>
</html>
