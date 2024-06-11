<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/iniciotutores.css">
    @vite(['resources/css/iniciotutores.css'])


    <!-- Scripts para DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>

    <!-- Link para fuentes de google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Danfo&family=Exo+2:ital,wght@0,100..900;1,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  
    <!-- Link para fuentes de google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Danfo&family=Exo+2:ital,wght@0,100..900;1,100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Zilla+Slab:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  </head>

    <!-- Link para gráficos -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body>
    <header>
    <div class="header-container">
      <div class="container-btn">
        <div class="btn-box">
          <a id="a-header" href="{{route('privadaPersonal')}}">Inicio</a>
          <a id="a-header" href="{{route('tutoresList')}}">Tutores</a>
          <a id="a-header" href="{{route('mascotaList')}}">Mascotas</a>
          <a id="a-header" href="{{route('insumoIndex')}}">Insumos</a>
          <a id="a-header" href="/citas">Citas</a>
          <a id="a-header" href="{{route('perfilPersonal')}}">Perfil</a>

          <a id="a-header" href="{{route('logoutPersonal')}}">Cerrar sesión</a>
        </div>
      </div>
    </div>
  </header>
<main>