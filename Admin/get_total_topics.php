<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "eqs"; 

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch table names from the database
$sql = "SHOW TABLES FROM eqs";
$result = $conn->query($sql);

if ($result) {
    $totalTopics = $result->num_rows;
} else {
    $totalTopics = 0;
}

// Close the database connection
$conn->close();
