var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 46.713614, lng: 38.275292},
    zoom: 8
  });
}
google.maps.event.addDomListener(window, 'load', initMap);

