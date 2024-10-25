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

    $id = $_POST["id"];
    $table_name = $_POST["table_name"]; 
    $update_fields = []; 

    if (isset($_POST["question"])) {
        $question = $mysqli->real_escape_string($_POST["question"]);
        $update_fields[] = "question='$question'";
    }

    if (isset($_POST["correct_answer"])) {
        $correct_answer = $mysqli->real_escape_string($_POST["correct_answer"]);
        $update_fields[] = "correct_answer='$correct_answer'";
    }

    if (isset($_POST["incorrect_answers"])) {
        $incorrect_answers = $mysqli->real_escape_string($_POST["incorrect_answers"]); 
        $update_fields[] = "incorrect_answers='$incorrect_answers'";
    }

    if (isset($_POST["explanation"])) {
        $explanation = $mysqli->real_escape_string($_POST["explanation"]); 
        $update_fields[] = "explanation='$explanation'";
    }

  
    if (!empty($update_fields)) {

        $update_query = "UPDATE `$table_name` SET " . implode(", ", $update_fields) . " WHERE id=$id";

        if ($mysqli->query($update_query) === TRUE) {
            echo "Question updated successfully";
        } else {
            echo "Error updating question: " . $mysqli->error;
        }
    } else {
        echo "No fields provided for update";
    }
}


$mysqli->close();

