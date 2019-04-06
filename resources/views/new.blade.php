@extends('layouts.app')

@section('title', 'Nova ocorrência')

@include('partials.leaflet')
@include('partials.leaflet-esri')

@section('style')
   <style>
       #mymap { height: 300px; }
   </style> 
@endsection

@section('content')

<div class="container">
    <form>
        <div class="form-group">
            <label for="mymap">Selecione no mapa o local da ocorrência</label>
            <small id="mymapWarning" class="form-text text-muted">Atenção: Apesar de serem permitidas denúncias anônimas, não são aceitos relatos falsos.</small>
            <div id="mymap"></div>
            <small id="mymapHelp" class="form-text text-muted"> </small>
            
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
</div>


@endsection


@section('scripts')
    <script>
        var mymap = L.map('mymap').setView([-30.050540, -51.184601], 13);
        // var mymap = L.map('mymap').locate();

        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoicGNyb2JlcnRvIiwiYSI6ImNqdTNkNnFzcjBtMXU0M3B2aHlyd2t1bDAifQ.J6-ZOT3QIWqqc8uOodmWGQ', {
		    maxZoom: 18,
		    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
    			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		    id: 'mapbox.streets'
    	}).addTo(mymap);



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