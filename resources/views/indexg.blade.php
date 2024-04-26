@extends('layouts.layout')
@section('title','Inicio')
@section('content')
<head>
  <link rel="stylesheet" href="/css/inicio.css">
</head>
  <center>

  <h1> CENTRO VETERINARIO MUNICIPAL DE ATENCION PRIMARIA </h1>

</center>  

<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/img/ejemplo1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/img/ejemplo2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="/img/ejemplo3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

  <h2>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
  Ut enim ad minim veniam, quis nostrud exercitation ullamco
  </h2>
    <!-- End Example Code -->
    <div>
      <CENTER>
      <h1>SEVICIOS</h1>
      </CENTER>
    <div class="container">
      <div class="row g-3">
          
      <div class="col-12 col-md-6 col-lg-4">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Esterilización</h5>
              <li class="card-text">Perros - $19.555</li>
              <li class="card-text">Gatos / Machos - $11.407</li>
              <li class="card-text">Gatas / Hembras - $13.037</li>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Vacunas anuales para perros y gatos</h5>
              <li class="card-text">Sextuple - $8.148</li>
              <li class="card-text">Triple Felina - $8.148</li>
              <li class="card-text">Antirrábica - $8.148</li>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Desparacitación interna</h5>
              <p class="card-text">$2.608</p>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Instalación de microchip y registro en el registro Nacional de Mascotas</h5>
              <p class="card-text">$16.296</p>
            </div>
          </div>
        </div>

      </div>
    </div>
    <center>
    <h1> Blogs y noticias</h1>
    </center>
    <div class="container">
      <div class="row g-3">
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card" style="width: 18rem;">
            <img src="/img/centrovetnoticia.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Avanza la construcción</h5>
              <p class="card-text">Avanza la construcción del Centro Veterinario Municipal en Viña del mar</p>
              <a href="https://twitter.com/sitiodelsuceso/status/1673844797201629184" class="btn btn-primary">Ir</a>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
          <div class="card" style="width: 18rem;">
            <img src="/img/noticia2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Ejemplo 2</h5>
              <p class="card-text">Importantes avances</p>
              <a href="https://www.munivina.cl/noticias/importantes-avances-presenta-construccion-de-primer-centro-veterinario-municipal-de-vina-del-mar/" class="btn btn-primary">Ir</a>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
          <div class="card" style="width: 18rem;">
            <img src="/img/noticia2.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Lugares Pet Friendly en Viña del Mar</h5>
              <p class="card-text">Listado de lugares Pet Friendly en la Comuna!</p>
              <a href="https://mascofood.cl/blogs/noticias/lugares-pet-friendly-en-vina-del-mar" class="btn btn-primary">Ir</a>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
          <div class="card" style="width: 18rem;">
            <img src="/img/noticia3.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Incendios en Viña del Mar</h5>
              <p class="card-text">Los operativos para atender a los 3000 animales afectados</p>
              <a href="https://www.latercera.com/la-tercera-pm/noticia/incendios-en-vina-del-mar-los-operativos-para-atender-a-los-3000-animales-afectados/DH3RJNF43ZBZTAF26476F4VXOM/#" class="btn btn-primary">Ir</a>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
          <div class="card" style="width: 18rem;">
            <img src="/img/noticia4.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">MUNICIPIO DE VIÑA DEL MAR CONSTRUIRÁ ÁREAS PARA MASCOTAS Y MEJORARÁ PLAZA EN 12 NORTE</h5>
              <p class="card-text">Iniciativa priorizada por vecinos en la 1a consulta de participación ciudadana “Viña decide” busca revitalizar espacio público incluyendo circuitos para entrenamiento canino</p>
              <a href="https://www.munivina.cl/noticias/municipio-de-vina-del-mar-construira-areas-para-mascotas-y-mejorara-plaza-en-12-norte/" class="btn btn-primary">Ir</a>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
          <div class="card" style="width: 18rem;">
            <img src="/img/noticia5.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Municipio de Viña del Mar inició campaña de adopción de mascotas rescatadas de incendio forestal</h5>
              <p class="card-text">Revisa dónde deben ir los interesados en cuidar “a un peludo afectado por la emergencia”.</p>
              <a href="https://www.soychile.cl/Valparaiso/Sociedad/2024/02/06/846762/municipio-vina-campana-adopcion-mascotas.html" class="btn btn-primary">Ir</a>
            </div>
          </div>
        </div>

        </div>
      </div>
    </div>
  </body>
</html>
@endsection