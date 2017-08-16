<?php
$address = 'universidade federal rural da amazonia';
$prepAddr = str_replace(' ','+',$address);
$url = "http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false";
$response = file_get_contents($url);
$response = json_decode($response, true);

//print_r($response);

$lat = $response['results'][0]['geometry']['location']['lat'];
$long = $response['results'][0]['geometry']['location']['lng'];

echo "latitude: " . $lat . " longitude: " . $long;
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
	    <script>
      function initMap() {
        var uluru = {lat: <?php echo $lat;?>, lng: <?php echo $long; ?> };
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
	    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDH-bx6ifyLYtMkY3jX5Vfa6M7BsUsW3nc&callback=initMap">
    </script>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <div id="map"></div><br>
	   <?php echo "<a href='view.php'>Voltar</a>" ?>

  </body>
</html>
