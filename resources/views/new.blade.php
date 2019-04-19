@extends('layouts.app')

@section('title', 'Nova ocorrência')

@include('partials.leaflet')
@include('partials.leaflet-esri')

@section('style')
    <link href="{{ asset('css/callout.css') }}" rel="stylesheet"> 
    <style>
        #mymap { height: 30%; }
    </style> 
@endsection

@section('content')

<div class="container my-3 p-3 bg-white rounded shadow-lg">
    {{ Form::open(['route' => 'save.ocorrencia']) }}
        <div class="form-group">
            <label for="mymap">Onde aconteceu?</label>
            <small id="mymapWarning" class="form-text text-muted">Selecione no mapa abaixo a localização do acontecimento.</small>
            <div id="mymap"></div>
            <small id="mymapHelp" class="form-text text-muted"> </small>
            {{ Form::hidden('endereco', null, ['id' => 'endereco']) }}
            {{ Form::hidden('cidade', null, ['id' => 'cidade']) }}
            {{ Form::hidden('estado', null, ['id' => 'estado']) }}
            {{ Form::hidden('latitude', null, ['id' => 'latitude']) }}
            {{ Form::hidden('longitude', null, ['id' => 'longitude']) }}
        </div>
        <div class="form-group ">
            {{ Form::label("crime", "O que aconteceu?", ['class' => 'form-label-sm']) }}
            {{ Form::select(
                "crime", 
                App\Model\Crime::pluck('descricao', 'id'), 
                null, 
                ['class' => 'form-control form-control-sm ', 'placeholder' => 'Selecione...', 'required']
            ) }}
        </div>
        <div class="form-row">
            <div class="form-group col-sm-6">
                {{ Form::label("data", "Em qual dia aconteceu?", ['class' => 'form-label-sm']) }}
                {{ Form::date("data", null, ['class' => 'form-control form-control-sm ', 'required']) }}
                <small class="form-text text-muted">Exemplo: 30/04/2019</small>
            </div>
            <div class="form-group col-sm-6">
                {{ Form::label("hora", "Em que hora aconteceu?", ['class' => 'form-label-sm']) }}
                {{ Form::time("hora", null, ['class' => 'form-control form-control-sm ', 'required']) }}
                <small class="form-text text-muted">Exemplo: 13:50</small>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label("descricao", "Descreva com suas palavras", ['class' => 'form-label-sm']) }}
            {{ Form::textarea("descricao", null, ['class' => 'form-control form-control-sm ', 'rows' => "3", 'placeholder' => "Descrição do caso", 'required']) }}
        </div>
        <hr>
        <div class="bd-callout bd-callout-warning">
            <h5>Dados da vítima</h5>
            <p>Abaixo serão pedidos os dados da vítima, porém você é livre para informar somente aquilo o que desejar.</p>
        </div>
        <div class="form-group">
            {{ Form::label("nomeVitima", "Nome", ['class' => 'form-label-sm']) }}
            {{ Form::text("nomeVitima", null, ['class' => 'form-control form-control-sm ', 'placeholder' => "Nome"]) }}
        </div>
        <div class="form-row">
            <div class="form-group col-sm-6">
                {{ Form::label("dataNasicmento", "Data de nascimento", ['class' => 'form-label-sm']) }}
                {{ Form::date("dataNasicmento", null, ['class' => 'form-control form-control-sm ']) }}
                <small class="form-text text-muted">Exemplo: 30/04/2019</small>
            </div>
            <div class="form-group col-sm-6">
                {{ Form::label("sexo", "Sexo", ['class' => 'form-label-sm']) }}
                {{ Form::select(
                    "sexo", 
                    [
                        "Feminino" => "Feminino",
                        "Masculino" => "Masculino"
                    ], 
                    null, 
                    ['class' => 'form-control form-control-sm ', 'placeholder' => "Prefiro não dizer"]) }}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-6">
                {{ Form::label("idade", "Idade", ['class' => 'form-label-sm']) }}
                {{ Form::number("idade", null, ['class' => 'form-control form-control-sm ']) }}
                <small class="form-text text-muted">Somente números</small>
            </div>
            <div class="form-group col-sm-6">
                {{ Form::label("etnia", "Etnia", ['class' => 'form-label-sm']) }}
                {{ Form::select(
                    "etnia", 
                    [
                        "Branco" => "Branco",
                        "Pardo" => "Pardo",
                        "Negro" => "Negro",
                        "Indígena" => "Indígena",
                        "Amarelo" => "Amarelo"
                    ], 
                    null, 
                    ['class' => 'form-control form-control-sm ', 'placeholder' => "Prefiro não dizer"]) }}
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-6">
                {{ Form::label("boletim", "Foi registrado boletim de ocorrencia?", ['class' => 'form-label-sm']) }}
                {{ Form::select(
                    "boletim", 
                    [ false => "Não", true => "Sim" ], 
                    null, 
                    ['class' => 'form-control form-control-sm ', 'placeholder' => "Prefiro não dizer"]) }}
            </div>
            <div class="form-group col-sm-6">
                {{ Form::label("email", "Email", ['class' => 'form-label-sm']) }}
                {{ Form::email("email", null, ['class' => 'form-control form-control-sm ', 'placeholder' => "Email"]) }}
                <small class="form-text text-muted">Exemplo: fulano@dominio.com.br</small>
            </div>
        </div>
        {{Form::submit("Salvar", [ 'class' => 'btn btn-primary' ])}}
    {{ Form::close() }}
    
</div>


@endsection


@section('scripts')
    @include('partials.map');
    <script>
        var marker = L.marker();
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
                $('#latitude').val(e.latlng.lat);
                $('#longitude').val(e.latlng.lng);
            });
        });
    </script>

    
@endsection
