<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "eqs_users"; 

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$totalUsers = 0;
$sql = "SELECT COUNT(*) as total FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalUsers = $row['total'];
}

$conn->close();

