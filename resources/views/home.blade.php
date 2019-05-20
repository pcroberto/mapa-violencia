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
{{-- <div class="container-fluid"> --}}
    <div id="mymap"></div>
{{-- </div> --}}


@endsection


@section('scripts')
@include('partials.map')
    <script>
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