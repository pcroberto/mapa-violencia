@extends('layouts.app')

@section('title', 'Page Title')

@include('partials.leaflet')

@section('style')
   <style>
       #mapid { height: 100%; }
   </style> 
@endsection

@section('content')
<div class="container-fluid">
    <div id="mapid"></div>
</div>


@endsection


@section('scripts')
    <script>
        var mapid = L.map('mapid').setView([-30.050540, -51.184601], 13);

        // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        // }).addTo(mapid);
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoicGNyb2JlcnRvIiwiYSI6ImNqdTNkNnFzcjBtMXU0M3B2aHlyd2t1bDAifQ.J6-ZOT3QIWqqc8uOodmWGQ', {
		    maxZoom: 18,
		    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
    			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		    id: 'mapbox.streets'
    	}).addTo(mapid);
    </script>

    
@endsection