<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "eqs";


$mysqli = new mysqli($servername, $username, $password, $database);


if ($mysqli->connect_error) {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Connection failed: " . $mysqli->connect_error]);
    exit;
}

$query = "SHOW TABLES";
$result = $mysqli->query($query);

$tables = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tableName = $row["Tables_in_eqs"];

 
        $columnsQuery = "SHOW COLUMNS FROM `$tableName`";
        $columnsResult = $mysqli->query($columnsQuery);
        $columnNames = [];

        while ($columnRow = $columnsResult->fetch_assoc()) {
            $columnNames[] = $columnRow["Field"];
        }

        $requiredColumns = ['id', 'question', 'correct_answer', 'incorrect_answers', 'explanation'];
        $missingColumns = array_diff($requiredColumns, $columnNames);

        if (empty($missingColumns)) {
            $tables[] = $tableName;
        }
    }
}


$mysqli->close();


header('Content-Type: application/json');
echo json_encode($tables);

