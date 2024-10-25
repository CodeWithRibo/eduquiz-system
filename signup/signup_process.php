<?php
include '../connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = ucwords($_POST["firstname"]); 
    $lastname = ucwords($_POST["lastname"]);
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeatpassword = $_POST["repeatpassword"];

    if ($password !== $repeatpassword) {
        echo "<script>alert('Error: Passwords do not match'); window.location.href='signup.php';</script>";
        exit;
    }

    $checkEmailQuery = "SELECT id FROM users WHERE email = ?";
    $checkStmt = $mysqli->prepare($checkEmailQuery);
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        echo "<script>alert('Error: Email is already registered'); window.location.href='signup.php';</script>";
        exit;
    }

    $insertUserQuery = "INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)";
    $insertStmt = $mysqli->prepare($insertUserQuery);
    $insertStmt->bind_param("ssss", $firstname, $lastname, $email, $password);

    if ($insertStmt->execute()) {
        header("Location: ../Login/login.php");
        exit;
    } else {
        echo "Error inserting user data: " . $insertStmt->error;
    }

    $insertStmt->close();
    $checkStmt->close();
}

$mysqli->close();
?>