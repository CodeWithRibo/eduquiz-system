<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_SESSION['user_id'])) {
       
        // $servername = "localhost:8888";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "eqs_users";


       
        $conn = new mysqli($servername, $username, $password, $dbname);

     
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $newFirstname = $conn->real_escape_string($_POST['new-firstname']);
        $newLastname = $conn->real_escape_string($_POST['new-lastname']);
        $userId = $_SESSION['user_id'];


        $sql = "UPDATE users SET firstname='$newFirstname', lastname='$newLastname' WHERE id=$userId";
        if ($conn->query($sql) === TRUE) {
            header("Location: settings_personal-info.php");
            exit();
        } else {
            echo "Error updating name: " . $conn->error;
        }


        $conn->close();
    }
}
?>
