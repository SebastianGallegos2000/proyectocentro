<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Bootstrap 5 icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



  <!-- Css -->
  @vite(['resources/css/inicio.css'])


      <!-- Scripts para DataTables -->
      <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
      <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/adminIndex">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/rolesIndex">Roles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('insumoIndexAdmin')}}">Insumos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/usuarios">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/comunaIndex">Comunas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/razamascotaIndex">Razas de Mascotas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/especialidadIndex">Especialidades</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"> Perfil</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/logout">Editar Perfil</a></li>
                        <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main>