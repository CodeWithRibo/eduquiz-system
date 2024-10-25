<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "eqs_users"; 

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT COUNT(*) as total_contacts FROM contact_us";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    $totalContacts = $row['total_contacts'];
} else {
    $totalContacts = 0;
}

