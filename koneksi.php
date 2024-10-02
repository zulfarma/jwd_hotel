<?php 
  $host = "localhost";
  $username = "root";
  $password = "";
  $db = "hotel";

  $koneksi = mysqli_connect($host, $username, $password, $db);

  if (!$koneksi) {
    echo ("Database tidak terkoneksi".mysqli_connect_error());
  }
?>