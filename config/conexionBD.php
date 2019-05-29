<?php

$servername = "192.168.0.118";
$username = "root";
$password = "";
$dbname = "ferreteria";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Check connection
$conn->set_charset('utf8');
if ($conn->connect_error) {
    die("Conexión fallida!! :(:" . $conn->connect_error);
}
?>