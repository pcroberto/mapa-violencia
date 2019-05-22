@extends('layouts.app')

@section('title', 'Mapa principal')

@include('partials.leaflet')

@section('style')
   <style>
       #mymap { height: 94vh; }
       .content-wrapper .wrapper {
           padding-top: 0%;
       }
   </style> 
@endsection

@section('content')
    <div id="mymap"></div>
@endsection


@section('scripts')
    <script src="{{ asset('js/lib/leaflet-heat.js') }}"></script>
    @include('partials.map')
    <script>
        var ocorrencias = @json($ocorrencias);
        var coordenadas = ocorrencias[0].localizacao.local.coordinates;
        mymap.setView([coordenadas[1], coordenadas[0]], 13);

        var localizacoes = new Array();

        $.map( ocorrencias, function( ocorrencia ) {
            var coordenadas = ocorrencia.localizacao.local.coordinates;
            localizacoes.push([coordenadas[1], coordenadas[0], 7]);
        });

        var heat = L.heatLayer(localizacoes).addTo(mymap);
        var draw = true;

        // mymap.on({
        //     movestart: function () { draw = false; },
        //     moveend:   function () { draw = true; },
        //     mousemove: function (e) {
        //         if (draw) {
        //             heat.addLatLng(e.latlng);
        //         }
        //     }
        // })
    </script>

    
@endsection