$(document).ready(function(){
var mylatang=new google.maps.LatLng(-3.397,150.644);
var map = new google.maps.Map(document.getElementById('map'), {
        center: mylatang,
        zoom: 8
      });
//making up new marker to take position  
function createMarker(latlng,icn){
var marker = new google.maps.Marker({
    position: mylatang,
    map: map,
    icon:icn,
    title: 'Hello World!'
  });
}
  var request = {
    location: mylatang,
    radius: '1500',
    type: ['restaurant']
  };

   service = new google.maps.places.PlacesService(map);
service.nearbySearch(request, callback);
  
 function callback(results, status) {
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
var place = results[i];
latlng=place.geometry.location;
icn=place.icon;       
createMarker(latlng,icn);
    }
  }
}

});
