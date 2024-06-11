@extends('layouts.layoutadmin')
@section('title','Inicio')
@section('content')

<div class="container" id="container-user">
    <div class="row" id="container-text">
        <h4>
            Datos del usuario
        </h4>

        <div class="col-sm" id="user-1">
            11.111.111-1
        </div>
        <div class="col-sm" id="user-1">
            Nombre
        </div>
        <div class="col-sm" id="user-1">
            Apellido
        </div>
        <div class="col-sm" id="user-1">
            Correo@ejemplo.com
        </div>
        <div class="col-sm" id="user-1">
            Fecha/Nacimiento/Tutor
        </div>
        <div class="col-sm" id="user-1">
            +56911111111
        </div>
    </div>
</div>

<div class="container" id="container-user">
    <div class="row" id="container-text">
        <h4>
                Insumos
        </h4>
    </div>
    <canvas id="myChart"></canvas>
        <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Guantes talla L', 'Guantes talla M', 'Guantes talla S','Biusturí'],
                datasets: [{
                    label: 'Cantidad de guantes',
                    data: [
                        @json($insumos->where('nombre_Insumo', 'Guantes Talla L')->first()->cantidad_Insumo),
                        @json($insumos->where('nombre_Insumo', 'Guantes Talla M')->first()->cantidad_Insumo),
                        @json($insumos->where('nombre_Insumo', 'Guantes Talla S')->first()->cantidad_Insumo),
                        @json($insumos->where('nombre_Insumo', 'Bisturí')->first()->cantidad_Insumo),

                    ],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>
    </div>
</html>
@endsection