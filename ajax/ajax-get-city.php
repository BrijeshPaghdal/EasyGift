<?php
  require_once('../config.php');
  session_start();
  $city =  mysqli_real_escape_string($conn, $_POST['city']);
  $latitude =  mysqli_real_escape_string($conn, $_POST['lat']);
  $longitude =  mysqli_real_escape_string($conn, $_POST['long']);

  $_SESSION['city'] = $city;
  $_SESSION['latitude'] = $latitude;
  $_SESSION['longitude'] = $longitude;


?>
