<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "eqs";

$mysqli = new mysqli($servername, $username, $password, $database);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tableName = $_POST["table_name"]; 
    $question = $_POST["question"];
    $correctAnswer = $_POST["correct_answer"];
    $incorrectAnswers = $_POST["incorrect_answers"];
    $explanation = $_POST["explanation"];


    $createTableSQL = "CREATE TABLE IF NOT EXISTS `$tableName` (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        question VARCHAR(255) NOT NULL,
        correct_answer VARCHAR(255) NOT NULL,
        incorrect_answers VARCHAR(255) NOT NULL,
        explanation TEXT,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($mysqli->query($createTableSQL)) {

        $stmt = $mysqli->prepare("INSERT INTO $tableName (question, correct_answer, incorrect_answers, explanation) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $question, $correctAnswer, $incorrectAnswers, $explanation);

        if ($stmt->execute()) {
            echo "Question added successfully to table $tableName.";
        } else {
            echo "Error adding question to table $tableName: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error creating table: " . $mysqli->error;
    }

    $mysqli->close();
}
?>
