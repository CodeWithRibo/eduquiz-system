<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $database = "eqs_users";


    $conn = new mysqli($servername, $username, $password, $database);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $firstname = $conn->real_escape_string($_POST['firstname']);
    $lastname = $conn->real_escape_string($_POST['lastname']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);


    $sql = "INSERT INTO contact_us (firstname, lastname, email, message) 
            VALUES ('$firstname', '$lastname', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    header('Location: ../logout/home-page.php');
    exit();
}

