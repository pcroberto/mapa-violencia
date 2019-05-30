@extends('layouts.app')

@section('title', 'Novo radar')

@include('partials.leaflet')
@include('partials.leaflet-esri')

@section('style')
    <link href="{{ asset('css/callout.css') }}" rel="stylesheet"> 
    <style>
        #mymap { height: 40%; }
    </style> 
@endsection

@section('content')

<div class="container my-3 p-3 bg-white rounded shadow-lg">
    {{ Form::open(['route' => 'save.radar']) }}
        @if(\Session::has('mensagem_sucesso'))
            <div class="alert alert-success">{{ \Session::get('mensagem_sucesso') }}</div>
        @endif

        @if(\Session::has('mensagem_erro'))
            <div class="alert alert-danger">{{ \Session::get('mensagem_erro') }}</div>
        @endif

        <div class="form-group">
            <label for="mymap">Informe a localização</label>
            <small id="mymapWarning" class="form-text text-muted">Selecione no mapa abaixo o ponto de partida para sua região de monitoramento.</small>
            <div id="mymap"></div>
            <small id="mymapHelp" class="form-text text-muted"> </small>
            {{ Form::hidden('endereco', null, ['id' => 'endereco']) }}
            {{ Form::hidden('cidade', null, ['id' => 'cidade']) }}
            {{ Form::hidden('estado', null, ['id' => 'estado']) }}
            {{ Form::hidden('pais', null, ['id' => 'pais']) }}
            {{ Form::hidden('latitude', null, ['id' => 'latitude']) }}
            {{ Form::hidden('longitude', null, ['id' => 'longitude']) }}
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6">
                {{ Form::label("nome", "Nome", ['class' => 'form-label-sm']) }}
                {{ Form::text("nome", null, ['class' => 'form-control form-control', 'placeholder' => "Dê um nome para identificar o seu radar"]) }}
            </div>
            <div class="form-group col-sm-6">
                {{ Form::label("raio", "Raio", ['class' => 'form-label-sm']) }}
                <div class="input-group mb-2">
                    {{ Form::number("raio", null, ['class' => 'form-control form-control', 'placeholder' => "Raio", 'min' => 1]) }}
                    <div class="input-group-append">
                        <span class="input-group-text" id="basic-addon2">metros</span>
                    </div>
                </div>
                <small class="form-text text-muted">Este campo representa o raio, em metros, da área do radar.</small>
            </div>
        </div>            

        <div class="form-group ">
            {{ Form::label("crime", "Crimes", ['class' => 'form-label']) }}    
            {{ Form::select(
                "crime[]", 
                App\Model\Crime::pluck('descricao', 'id'), 
                null, 
                ['class' => 'form-control form-control ','required', 'multiple']
            ) }}
            <small class="form-text text-muted">Você pode selecionar mais de um item pressionando a tecla 'Ctrl' </small>
        </div>

        {{Form::submit("Salvar", [ 'class' => 'btn btn-info' ])}}
    {{ Form::close() }}
    
</div>
@endsection


@section('scripts')
    @include('partials.map');
    <script>
        mymap.locate({setView : true});
        mymap.setZoom(13);
        var marker = L.marker();
        var circle = L.circle();
        var geocodeService = L.esri.Geocoding.geocodeService();

        mymap.on('click', function(e) {
            $('#mymapHelp').html("Buscando...");
            marker.setLatLng(e.latlng)
                  .addTo(mymap);

            geocodeService.reverse().latlng(e.latlng).run(function(error, result) {
                $('#mymapHelp').html(result.address.LongLabel);
                $('#endereco').val(result.address.LongLabel);
                $('#cidade').val(result.address.City);
                $('#estado').val(result.address.Region);
                $('#pais').val(result.address.CountryCode);
                $('#latitude').val(e.latlng.lat);
                $('#longitude').val(e.latlng.lng);
            });

            $('#raio').change();
        });

        $('#raio').change(function() {
            circle.setLatLng(marker.getLatLng());
            circle.setRadius($('#raio').val())
            circle.addTo(mymap);
        });


        $(document).ready(function() {
            $(window).keydown(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });
    </script>
@endsection