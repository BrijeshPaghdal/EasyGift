// Initialize and add the map
function initMap(latitude,longitude){
  // The location of Uluru
  alert(latitude);
  const uluru = { lat: -25.344, lng: 131.036 };
  // The map, centered at Uluru
  const map = new google.maps.Map(
    document.getElementById("map"),
    {
      zoom: 10,
      center: uluru,
    }
  );

  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}