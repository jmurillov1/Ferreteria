<?php

$servername = "localhost";
$username = "root";
$password = "cuenca";
$dbname = "hferreteria";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
$conn->set_charset('utf8');
if ($conn->connect_error) {
    die("Conexión fallida!! :(:" . $conn->connect_error);
}
?>