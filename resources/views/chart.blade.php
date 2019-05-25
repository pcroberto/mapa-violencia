
@extends('layouts.app')

@section('title', 'Mapa principal')

@include('partials.leaflet')

@section('style')
    <link href="{{ asset('css/lib/Chart.min.css') }}" rel="stylesheet">
    <style>
    </style> 
@endsection

@section('content')
    <div class="container my-3 p-3 bg-white rounded shadow-lg">
        <div class="card cadr-fluid">
            <div class="card-header">
                <h3 class="mb-0">Gráfico mensal</h3>
            </div>
            <canvas id="myChart"></canvas>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('js/lib/Chart.bundle.min.js') }}"></script>
    <script>
        var meses = @json($meses);
        var dados = @json($dados);
        
        var ctxL = document.getElementById("myChart").getContext('2d');
        var myLineChart = new Chart(ctxL, {
            type: 'line',
            data: {
                labels: meses,
            },
            options: {
                responsive: true
            }
        });

        console.log(dados);

        $.map( dados, function( valores, crime ) {
            var data = [];

            $.map( valores, function(quantidade, competencia) {
                data.push(quantidade);
            });
            
            let r = Math.floor((Math.random() * 255) + 0);
            let g = Math.floor((Math.random() * 255) + 0);
            let b = Math.floor((Math.random() * 255) + 0);

            var dataset = {
                label: crime,
                data: data,
                borderWidth: 2,
                backgroundColor: [
                    'rgba('+r+', '+g+', '+b+', .2)',
                ],
                borderColor: [
                    'rgba('+r+', '+g+', '+b+', .7)',
                ],
            };

            myLineChart.data.datasets.push(dataset);
            myLineChart.update();
        });


    </script>

{{-- datasets: [{
    label: "My First dataset",
    data: [65, 59, 80, 81, 56, 55, 40],
    borderWidth: 2
},
{
    label: "My Second dataset",
    data: [28, 48, 40, 19, 86, 27, 90],
    backgroundColor: [
        'rgba(0, 137, 132, .2)',
    ],
    borderColor: [
        'rgba(0, 10, 130, .7)',
    ],
    borderWidth: 2
}] --}}
    
@endsection



