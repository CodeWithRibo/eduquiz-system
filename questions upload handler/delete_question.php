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

    $query = "DELETE FROM $table_name WHERE id=$id";

    if ($mysqli->query($query) === TRUE) {
        echo "Question deleted successfully";
    } else {
        echo "Error deleting question: " . $mysqli->error;
    }
}

$mysqli->close();
?>
