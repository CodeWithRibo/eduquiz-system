<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "eqs_users"; 

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE users SET firstname=?, lastname=?, email=?, password=?, points=? WHERE id=?");
    $stmt->bind_param("ssssii", $firstname, $lastname, $email, $password, $points, $id);

    $firstname = $_POST['firstname'][0];
    $lastname = $_POST['lastname'][0];
    $email = $_POST['email'][0];
    $password = $_POST['password'][0];
    $points = $_POST['points'][0]; // Assuming 'points' is the name attribute of the input field for points.

    if ($stmt->execute()) {
        $response = array("success" => true);
        echo json_encode($response);
    } else {
        $response = array("success" => false);
        echo json_encode($response);
    }

    $stmt->close();
    $conn->close();
} else {
    $response = array("success" => false, "message" => "Invalid request");
    echo json_encode($response);
}
