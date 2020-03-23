<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$databaseName = "user";

$c = new mysqli($serverName,$userName,$password,$databaseName);
// if ($c->connect_error) {
//     die("Connection failed: " . $c->connect_error);
// }
// echo "Connected successfully";
?>