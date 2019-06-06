<?php 

// Forbindelse til databasen

$servername = "bielskicph.dk.mysql";
$dBUsername = "bielskicph_dk_ho";
$dBPassword = "bielski1009";
$dBName = "bielskicph_dk_ho";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName );

if (!$conn) {
    die("Connection failed: " .mysqli_connect_error());
}
?>