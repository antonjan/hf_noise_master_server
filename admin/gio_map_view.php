<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>HF Noise Stations</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>

      function initMap() {
        var myLatLng = {lat: -26.463, lng: 28.044};
        var station1 = {lat: -27.463, lng: 28.044};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
          center: myLatLng
        });

        var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'HF noise remote stations'
        });
        var marker2 = new google.maps.Marker({
          position: station1,
          map: map,
          title: 'HF noise remote stations 1'
        });

      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZaf2m_PtVBRoD1hYP510tyYZorJ7z9XE&callback=initMap">
    </script>
hellow world
  </body>
</html>
