<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eqs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, question, correct_answer, incorrect_answers, explanation FROM `environment_of_adobe_photoshop`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $questions = array();

  while ($row = $result->fetch_assoc()) {
    $question = array(
      "id" => $row["id"],
      "question" => $row["question"],
      "correct_answer" => $row["correct_answer"],
      "incorrect_answers" => explode(", ", $row["incorrect_answers"]),
      "explanation" => $row["explanation"]
    );
    array_push($questions, $question);
}



  echo json_encode(array("questions" => $questions));
} else {
  echo "No questions found";
}

$conn->close();
?>
