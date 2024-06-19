@extends('layouts.layout')
@section('title','Inicio')
@section('content')
<head>
  <link rel="stylesheet" href="/css/inicio.css">
</head>
  <center>

  <h1> CENTRO VETERINARIO DE ATENCIÓN PRIMARIA VIÑA DEL MAR </h1>

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
      <h1>SERVICIOS</h1>
      </CENTER>
    <div class="container" id="containerServicios">
      <div class="row g-3">

        <div class="flip-box">
          <div class="flip-box-inner">
            <div class="flip-box-front">
              <h2>Consulta Control Sano</h2>
            </div>
            <div class="flip-box-back">
              <h2>Back Side</h2>
            </div>
          </div>
        </div>

        <div class="flip-box">
          <div class="flip-box-inner">
            <div class="flip-box-front">
              <h2>Esterilización de Perros</h2>
            </div>
            <div class="flip-box-back">
              <h2>$19.555</h2>
            </div>
          </div>
        </div>

        <div class="flip-box">
          <div class="flip-box-inner">
            <div class="flip-box-front">
              <h2>Esterilización de Gatas</h2>
            </div>
            <div class="flip-box-back">
              <h2>$13.037</h2>
            </div>
          </div>
        </div>

        <div class="flip-box">
          <div class="flip-box-inner">
            <div class="flip-box-front">
              <h2>Esterilización de Gatos</h2>
            </div>
            <div class="flip-box-back">
              <h2>$11.407</h2>
            </div>
          </div>
        </div>

        <div class="flip-box">
          <div class="flip-box-inner">
            <div class="flip-box-front">
              <h2>Vacuna Antirrábica</h2>
            </div>
            <div class="flip-box-back">
              <h2>$8.148</h2>
            </div>
          </div>
        </div>

        <div class="flip-box">
          <div class="flip-box-inner">
            <div class="flip-box-front">
              <h2>Vacuna Sextuple</h2>
            </div>
            <div class="flip-box-back">
              <h2>$8.148</h2>
            </div>
          </div>
        </div>

        <div class="flip-box">
          <div class="flip-box-inner">
            <div class="flip-box-front">
              <h2>Vacuna Triple Felina</h2>
            </div>
            <div class="flip-box-back">
              <h2>$8.148</h2>
            </div>
          </div>
        </div>

        <div class="flip-box">
          <div class="flip-box-inner">
            <div class="flip-box-front">
              <h2>Desparacitación Interna</h2>
            </div>
            <div class="flip-box-back">
              <h2>$2.608</h2>
            </div>
          </div>
        </div>

        <div class="flip-box">
          <div class="flip-box-inner">
            <div class="flip-box-front">
              <h2>Instalación de Microchip </h2>
            </div>
            <div class="flip-box-back">
              <h2>$16.296</h2>
            </div>
          </div>
        </div>

      </div>
    </div>
    <center>
    <h1> Blogs y noticias</h1>
    </center>
    <div class="container">
      <article>
        <div class="flex-container">
          <img src="/img/centroveterinario.jpg" class="card-img-top" id="imgBlog" alt="...">
            <div>
              <a href="https://www.munivina.cl/noticias/importantes-avances-presenta-construccion-de-primer-centro-veterinario-municipal-de-vina-del-mar/" id="a-blog">Importantes avances</a>
              <p>Importantes avances registra el primer Centro Veterinaria Municipal de Atención Primaria de Viña del Mar que se construye 
                al interior del Vivero comunal El Tranque (7 Norte N° 1425, esquina Los Castaños) con recursos propios por $104 millones, 
                el cual muy pronto estará habilitado para atender a toda la comunidad viñamarina.
              
                La iniciativa es impulsada por la alcaldesa Macarena Ripamonti y se enmarca en el trabajo constante para promover la tenencia responsable de mascotas. 
                Su objetivo es contribuir de manera concreta al bienestar de los animales domésticos de vecinos y vecinas, al ofrecer una atención integral y adecuada.
              </p>
            </div>
        </div>
      </article>

      <article>
        <div class="flex-container">
          <img src="/img/noticia2.png" class="card-img-top" id="imgBlog" alt="...">
          <div>
          <a href="https://mascofood.cl/blogs/noticias/lugares-pet-friendly-en-vina-del-mar" id="a-blog">Lugares Pet Friendly en Viña del Mar</a>
              <p>
                En Mascofood entendemos lo difícil que es dejar a tu compañero peludo solo en casa. Con sus miradas amorosas y sus constantes muestras de afecto, 
                nuestras mascotas se han ganado nuestros corazones, generándose un vínculo muy fuerte entre ambos, lo que dificulta el mantenerse separados por mucho tiempo.
              
                Es por esto que, actualmente, muchos lugares se han declarado pet friendly. Este término proveniente del inglés hace referencia a que se aceptan mascotas en el 
                recinto o espacio, por lo que puedes acudir con tu perro o gato.

                Como creemos que los buenos datos se comparten, a continuación te dejamos una lista de lugares Pet Friendly en la ciudad de Viña del Mar, para que tú y tu 
                mascota puedan disfrutar de una salida juntos.
              </p>
            </div>
        </div>
      </article>

      <article>
        <div class="flex-container">
          <img src="/img/noticia3.png" class="card-img-top" id="imgBlog" alt="...">
          <div>
          <a href="https://www.latercera.com/la-tercera-pm/noticia/incendios-en-vina-del-mar-los-operativos-para-atender-a-los-3000-animales-afectados/DH3RJNF43ZBZTAF26476F4VXOM/#" id="a-blog">
            Los operativos para atender a los 3000 animales afectados
          </a>
              <p>
                En total 3000 animales aproximadamente han sido atendidos en distintos centros veterinarios, según el Colegio Médico Veterinario (Colmevet), 
                que han abierto sus puertas para curar a los pacientes que siguen llegando. Los principales lugares donde actualmente los reciben son la Escuela 
                Libertador Bernardo O’Higgins dispuesta por la municipalidad, además de centros veterinarios de universidades como el Hospital Veterinario Clínico 
                de la Universidad Andrés Bello y el Centro Veterinario de la Universidad de Las Américas. 
                En total según el Colmevet, existen entre 10 y 15 centros dispuestos para la atención de animales heridos.
              </p>
            </div>
        </div>
      </article>

      <article>
        <div class="flex-container">
          <img src="/img/noticia4.png" class="card-img-top" id="imgBlog" alt="...">
          <div>
          <a href="https://www.munivina.cl/noticias/municipio-de-vina-del-mar-construira-areas-para-mascotas-y-mejorara-plaza-en-12-norte/" id="a-blog">
            MUNICIPIO DE VIÑA DEL MAR CONSTRUIRÁ ÁREAS PARA MASCOTAS Y MEJORARÁ PLAZA EN 12 NORTE
          </a>
              <p>
                Una novedosa iniciativa para revitalizar la plaza Dr. Aníbal Scarella en 12 Norte con 4 Oriente, y que será el primer espacio público de la 
                comuna con un lugar especial para mascotas está implementando el municipio de Viña del Mar.
              
                El proyecto está en proceso de licitación y es impulsado por la alcaldesa Macarena Ripamonti, atendiendo el resultado de la Primera Consulta: 
                Acciones para combatir el cambio climático en Viña del Mar, “Viña Decide”. Su financiamiento se realizará con recursos del Fondos Nacional de 
                Desarrollo Regional (FNDR) a través de la modalidad del Fondo Regional de Iniciativa Local (FRIL).

                La jefa comunal explicó que “la recuperación del sector Oriente de Viña del Mar es fundamental para un barrio en que no ha existido mayor 
                inversión en la última década y eso ha propiciado espacios inseguros para el comercio y sobre todo para los vecinos que principalmente son 
                población mayor”.
              </p>
            </div>
        </div>
      </article>

      <article>
        <div class="flex-container">
          <img src="/img/noticia5.png" class="card-img-top" id="imgBlog" alt="...">
          <div>
          <a href="https://www.soychile.cl/Valparaiso/Sociedad/2024/02/06/846762/municipio-vina-campana-adopcion-mascotas.html" id="a-blog">
            Municipio de Viña del Mar inició campaña de adopción de mascotas rescatadas de incendio forestal
          </a>
              <p>
                La municipalidad de Viña del Mar inició una campaña para adoptar animales que fueron rescatados durante el desarrollo de 
                los incendios forestales que afectaron varios puntos de la comuna.
              
                Fuente: https://www.soychile.cl/Valparaiso/Sociedad/2024/02/06/846762/municipio-vina-campana-adopcion-mascotas.html 
                Sitio:Soychile.cl
              </p>
          </div>
        </div>
      </article>


        </div>
      </div>
    </div>
  </body>
</html>
@endsection