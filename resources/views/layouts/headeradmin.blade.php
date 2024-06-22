<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap 5 icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- Css -->
    <link rel="stylesheet" href="/css/iniciotutores.css">
    @vite(['resources/css/iniciotutores.css'])

    <!-- Scripts para DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>

    <!-- Link para gráficos -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Link para Fullcalendar -->
    <link href='https://fullcalendar.io/releases/main/base.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>

    <!-- Link para NavBar-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>
<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('adminIndex')}}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('rolesIndex')}}">Roles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('insumoIndexAdmin')}}">Insumos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('usuarios')}}">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('comunaIndex')}}">Comunas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('razamascotaIndex')}}">Razas de Mascotas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('especialidadIndex')}}">Especialidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('tipoAtencionIndex')}}">Tipo Atención</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('citasAdmin')}}">Citas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logoutPersonal')}}">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main>