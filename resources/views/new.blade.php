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
    <form>
        <div class="form-group">
            <label for="mymap">Onde aconteceu?</label>
            <small id="mymapWarning" class="form-text text-muted">Atenção: Apesar de serem permitidas denúncias anônimas, não são aceitos relatos falsos.</small>
            <div id="mymap"></div>
            <small id="mymapHelp" class="form-text text-muted"> </small>   
        </div>
        <div class="form-group ">
            <label for="crime" class="form-label-sm">O que aconteceu?</label>
            <select class="form-control form-control-sm bg-light-orange" id="crime">
                <option value="0">Selecione...</option>

                @foreach ($crimes as $crime)
                    <option value="{{ $crime->id }}">{{ $crime->descricao }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="data" class="form-label-sm">Em qual dia aconteceu?</label>
                <input type="date" class="form-control form-control-sm bg-light-orange" id="data">
                <small class="form-text text-muted">Exemplo: 30/04/2019</small>
            </div>
            <div class="form-group col-sm-6">
                <label for="hora" class="form-label-sm">Em que hora aconteceu?</label>
                <input type="time" class="form-control form-control-sm bg-light-orange" id="hora">
                <small class="form-text text-muted">Exemplo: 13:50</small>
            </div>
        </div>
        <div class="form-group">
            <label for="descricao" class="form-label-sm">Descreva com suas palavras</label>
            <textarea class="form-control form-control-sm bg-light-orange" id="descricao" rows="3"></textarea>
        </div>
        <hr>
        <div class="bd-callout bd-callout-warning">
            <h5>Dados da vítima</h5>
            <p>Abaixo serão pedidos os dados da vítima, porém você é livre para informar somente aquilo o que desejar.</p>
        </div>
        <div class="form-group">
            <label for="nomeVitima" class="form-label-sm">Nome</label>
            <input type="text" class="form-control form-control-sm bg-light-orange" id="nomeVitima">
        </div>
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="dataNasicmento" class="form-label-sm">Data de nascimento</label>
                <input type="date" class="form-control form-control-sm bg-light-orange" id="dataNasicmento">
                <small class="form-text text-muted">Exemplo: 30/04/2019</small>
            </div>
            <div class="form-group col-sm-6">
                <label for="sexo" class="form-label-sm">Sexo</label>
                <select class="form-control form-control-sm bg-light-orange" id="sexo">
                    <option value="1">Prefiro não dizer</option>
                    <option value="2">Feminino</option>
                    <option value="3">Masculino</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="idade" class="form-label-sm">Idade</label>
                <input type="text" class="form-control form-control-sm bg-light-orange" id="idade">
                <small class="form-text text-muted">Somente números</small>
            </div>
            <div class="form-group col-sm-6">
                <label for="cor" class="form-label-sm">Etnia</label>
                <select class="form-control form-control-sm bg-light-orange" id="cor">
                    <option value="1">Prefiro não dizer</option>
                    <option value="2">Branco</option>
                    <option value="3">Pardo</option>
                    <option value="4">Negro</option>
                    <option value="5">Indígena</option>
                    <option value="6">Amarelo</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="crime" class="form-label-sm">Foi registrado o boletim de ocorrência?</label>
                <select class="form-control form-control-sm bg-light-orange" id="crime">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="form-group col-sm-6">
                <label for="idade" class="form-label-sm">Email</label>
                <input type="email" class="form-control form-control-sm bg-light-orange" id="email">
            </div>
        </div>
        <button id="salvar" class="btn btn-primary">Salvar</button>
    </form>
    
</div>


@endsection


@section('scripts')
    @include('partials.map');
    <script>
        var marker = L.marker();

        var geocodeService = L.esri.Geocoding.geocodeService();

        function onMapClick(e) {
            marker.setLatLng(e.latlng)
                  .addTo(mymap);
            
            geocodeService.reverse().latlng(e.latlng).run(function(error, result) {
                $('#mymapHelp').html(result.address.LongLabel);
            });
        }

        mymap.on('click', onMapClick);
    </script>

    
@endsection