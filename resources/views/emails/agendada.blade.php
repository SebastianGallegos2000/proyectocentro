<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Cita Agendada</title>
    <!-- Incluir Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        h1 {
            color: #007bff;
            font-size: 24px;
        }
        p {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalles de la Cita Agendada</h1>
        <p>Fecha: {{ $solicitud->fecha_SolicitudCita }}</p>
        <p>Hora de Inicio: {{ $solicitud->horaInicio_SolicitudCita }}</p>
        <p>Hora de Término: {{ $solicitud->horaTermino_SolicitudCita }}</p>
        <p>Mascota: {{ $solicitud->mascota->nombre_Mascota ?? 'N/A' }}</p>
        <p>Servicio: {{ $solicitud->tipoAtencion->nombre_TipoAtencion ?? 'N/A' }}</p>
    </div>
    <!-- Opcional: Incluir Bootstrap JS y sus dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>