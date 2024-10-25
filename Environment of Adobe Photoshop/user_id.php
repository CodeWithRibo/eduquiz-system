<?php
session_start();
include '../connect.php'; // Include your database connection file

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect or display an error message
    header("Location: ../login/login.php");
    exit;
}

$user_id = $_SESSION['id']; // Assuming 'id' is your user ID column name

// Function to get the user's quiz table name based on id
function getUserQuizTable($user_id) {
    return "user_scores_" . $user_id; // Modify this based on your naming convention
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data and sanitize if needed

    $quiz_table = getUserQuizTable($user_id);

    // Check if the user's quiz table exists, create it if not
    $createTableQuery = "CREATE TABLE IF NOT EXISTS $quiz_table (
        quiz_id INT PRIMARY KEY AUTO_INCREMENT,
        quiz_name VARCHAR(255),
        score INT,
        date_completed DATETIME DEFAULT CURRENT_TIMESTAMP
    )";
    $mysqli->query($createTableQuery);

    // Insert quiz score into the user's specific quiz table
    $insertScoreQuery = "INSERT INTO $quiz_table (quiz_name, score) VALUES (?, ?)";
    $stmt = $mysqli->prepare($insertScoreQuery);
    $stmt->bind_param("si", $quiz_name, $score); // Assuming $quiz_name and $score are obtained from form data
    $stmt->execute();
    $stmt->close();

    // Redirect or show success message
    header("Location: quiz_results.php"); // Redirect to a results page or home page
    exit;
}

$mysqli->close();
