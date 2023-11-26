<?php
$servername = "127.0.0.1:3308";
$username = "root";
$password = "Eg36gqhnpr";
$databasename = "crud";
// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
if (!$conn) {
    die(mysqli_connect_error());
}

?>