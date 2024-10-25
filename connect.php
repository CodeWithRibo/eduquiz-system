<?php
// MySQL database credentials
// $servername = "localhost:8888";
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "eqs_users"; 


// Create connection
$mysqli = new mysqli($servername, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


