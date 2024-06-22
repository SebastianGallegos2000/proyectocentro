<!DOCTYPE html>
<html>
<head>
    <title>Historial de Atenciones</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        p {
            font-size: 10px;
            font-weight: bold;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .header img {
            width: 100px; /* Ajusta este valor según el tamaño deseado para tu logo */
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('img/logoMunicipalidad.png') }}" alt="Logo"> <!-- Asegúrate de ajustar la ruta a la ubicación de tu logo -->
        <h1>CENTRO VETERINARIO DE ATENCIÓN PRIMARIA MUNICIPIO DE CUIDADOS</h1>
    </div>
    <h2>Historial de Atenciones</h2>
    <table>
                <!-- Datos del Tutor (Ajusta según tu modelo) -->
                <tr>
                    <th colspan="4">Datos del Tutor</th>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td colspan="3">{{ $mascota->tutor->persona->nombre_Persona }} {{ $mascota->tutor->persona->apellido_Persona }}</td>
                </tr>
                <tr>
                    <td>Rut</td>
                    <td colspan="3">{{ $mascota->tutor->persona->rut_Persona }}-{{$mascota->tutor->persona->dv_Persona}}</td>
                </tr>
                <tr>
                    <td>Correo</td>
                    <td colspan="3">{{ $mascota->tutor->persona->correo_Persona }}</td>
                </tr>
                <tr>
                    <td>Número de teléfono</td>
                    <td colspan="3">{{$mascota->tutor->persona->telefono_Persona}}</td>
                </tr>
                        <!-- Datos de la Mascota -->
        <tr>
            <th colspan="4">Datos de la Mascota</th>
        </tr>
        <tr>
            <td>Nombre</td>
            <td colspan="3">{{ $mascota->nombre_Mascota }}</td>
        </tr>
        <tr>
            <td>Raza</td>
            <td colspan="3">{{$mascota->razamascotas->nombre_Razamascota}}</td>
        </tr>
        <tr>
            <td>Número de Chip</td>
            <td colspan="3">
                @if(!empty($mascota->nroChip_Mascota))
                    {{ $mascota->nroChip_Mascota }}
                @else
                    No posee
                @endif
            </td>
        </tr>
        <tr>
            <td>Edad</td>
            <td colspan="3">{{$mascota->edad_Mascota}}</td>
        </tr>
        <tr>
            <td>Especie</td>
            <td colspan="3">{{$mascota->especie_Mascota}}</td>
        </tr>
        <tr>
            <td>Sexo</td>
            <td colspan="3">{{$mascota->sexo_Mascota}}</td>
        </tr>
    </table>
    @foreach ($atenciones as $atencion)
    <p>ID Atencion:{{$atencion->id}}</p>
    <table>
        <!-- Datos del Personal para cada Atención -->
        <tr>
            <th colspan="4">Datos del Personal</th>
        </tr>
        <tr>
            <td>Nombre</td>
            <td colspan="3">{{ $atencion->personal->persona->nombre_Persona }} {{ $atencion->personal->persona->apellido_Persona }}</td>
        </tr>
        <!-- Datos de la Atención -->
        <tr>
            <th colspan="4">Detalles de la Atención</th>
        </tr>
        <tr>
            <td>Fecha:</td>
            <td colspan="3">{{$atencion->solicitudcitas->fecha_SolicitudCita}}</td>
        </tr>
        <tr>
            <td>Tipo de Atención:</td>
            <td colspan="3">{{$atencion->solicitudcitas->tipoatencion->nombre_TipoAtencion}}</td>
        </tr>
        <tr>
            <td>Hora de Atención:</td>
            <td colspan="3">{{$atencion->solicitudcitas->horaInicio_SolicitudCita}}</td>
        </tr>
        <tr>
            <td>Observaciones:</td>
            <td colspan="3">{{ $atencion->observacion_Atencion }}</td>
        </tr>
        <tr>
            <td>Peso inicial de la mascota:</td>
            <td>{{ $mascota->peso_Mascota }}</td>
            <td>Peso obtenido en la consulta:</td>
            <td>{{ $atencion->peso_Atencion }}</td>
        </tr>
    </table>
    <!-- Espacio entre atenciones -->
    <div style="height: 60px;"></div>
    @endforeach
</body>
</html>