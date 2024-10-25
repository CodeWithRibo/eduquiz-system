<?php
session_start();
include '../connect.php';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $firstname = $_POST["firstname"];

    // Retrieve user data from database based on email
    $stmt = $mysqli->prepare("SELECT id, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Verify password
    if ($user && $password === $user['password']) { // Compare plain password
        // Authentication successful
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['firstname'] = $firstname['firstname'];
        header("Location: ../Index/login_reward.php");
        exit;
    } else {
        // Invalid email or password
        echo "<script>alert('Invalid email or password'); window.location.href='login.php';</script>";
        exit;
    }
}

$mysqli->close();
?>
