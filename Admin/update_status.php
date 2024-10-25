<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "eqs_users"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    $sql = "UPDATE contact_us SET status='$status' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "error" => $conn->error));
    }
} else {
    echo json_encode(array("success" => false, "error" => "Invalid parameters"));
}

$conn->close();
?>
