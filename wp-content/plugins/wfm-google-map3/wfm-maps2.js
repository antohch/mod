var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: +wfmObj.cords1, lng: +wfmObj.cords2},
    zoom: +wfmObj.zoom
  });
}

google.maps.event.addDomListener(window, 'load', initMap);

