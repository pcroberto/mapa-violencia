<script>
    var mymap = L.map('mymap');

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoicGNyb2JlcnRvIiwiYSI6ImNqdTNkNnFzcjBtMXU0M3B2aHlyd2t1bDAifQ.J6-ZOT3QIWqqc8uOodmWGQ', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox.streets'
    }).addTo(mymap);
    
    L.control.scale().addTo(mymap);
</script>