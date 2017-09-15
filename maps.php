<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
include_once("connection.php");

$result = mysqli_query($mysqli, "SELECT endereco FROM imovel  WHERE id =".$_GET['id']."");

while($res = mysqli_fetch_array($result)) {
    echo "<h1>";
    echo $endereco = $res['endereco']."<br>";
    echo "</h1>";
    $address = str_replace(' ','+',$endereco);
    $url = "http://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false";
    $response = file_get_contents($url);
    $response = json_decode($response, true);

    $lat = $response['results'][0]['geometry']['location']['lat'];
    $long = $response['results'][0]['geometry']['location']['lng'];
    echo "<h6>";
    echo "latitude: " . $lat . " longitude: " . $long;
    echo "</h6>";
}
?>
<!DOCTYPE html>
<html>
  <head>
      <title>Maps</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

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
    <h4>My Google Maps Demo</h4>
    <div id="map"></div><br>
	   <?php echo "<button type='button' class='btn btn-dark'><a href='viewImovel.php'>Voltar</button></a>" ?>
  </body>
</html>
