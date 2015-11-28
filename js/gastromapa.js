var map;
var myLatLng = {lat: 42.33757, lng: -7.8651497};
var array = new Array();
function direcciones(d){
    array=d;
    initMap();
}


function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        center: myLatLng,
        scrollwheel: false
    });
    var geocoder = new google.maps.Geocoder();
    geocodeAddress(geocoder, map);
}

function geocodeAddress(geocoder, resultsMap) {
    var i;
    for(i=0; i<array.length; i++){
        var address = array[i].direccionE;
        geocoder.geocode({'address': address}, function(results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                resultsMap.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location
                });
            }
        });
    }
}