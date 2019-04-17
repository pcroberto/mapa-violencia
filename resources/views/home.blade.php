@extends('layouts.app')

@section('title', 'Page Title')

@include('partials.leaflet')

@section('style')
   <style>
       #mymap { height: 100%; }
       .content-wrapper .wrapper {
           padding-top: 0%;
       }
   </style> 
@endsection

@section('content')
{{-- <div class="container-fluid"> --}}
    <div id="mymap"></div>
{{-- </div> --}}


@endsection


@section('scripts')
    <script>
        var mymap = L.map('mymap').setView([-30.050540, -51.184601], 13);

        // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        // }).addTo(mapid);
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoicGNyb2JlcnRvIiwiYSI6ImNqdTNkNnFzcjBtMXU0M3B2aHlyd2t1bDAifQ.J6-ZOT3QIWqqc8uOodmWGQ', {
		    maxZoom: 18,
		    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
    			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		    id: 'mapbox.streets'
        }).addTo(mymap);
        
        var ocorrencias = @json($ocorrencias);

        $.map( ocorrencias, function( ocorrencia ) {
            var mensagem = "<b>" + ocorrencia.crime.descricao + "</b>";
                mensagem += "<br>";
                mensagem += "<i>" + ocorrencia.datahora + "</i>";
                mensagem += "<br>";
                mensagem += ocorrencia.descricao;
        
            var coordenadas = ocorrencia.localizacao.local.coordinates;
            var marker = L.marker();
                marker.setLatLng([coordenadas[1], coordenadas[0]])
                      .bindPopup(mensagem)
                      .addTo(mymap);
        });
    </script>

    
@endsection