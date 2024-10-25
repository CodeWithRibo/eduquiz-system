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

        $form_type = $_POST['form-type'];


        if ($form_type == "email") {

            $new_email = $_POST['new-email'];


            $sql = "UPDATE users SET email = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $new_email, $_SESSION['user_id']);
            $stmt->execute();
            $stmt->close();
        }


        elseif ($form_type == "password") {

            $new_password = $_POST['new-password'];


            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);


            $sql = "UPDATE users SET password = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $hashed_password, $_SESSION['user_id']);
            $stmt->execute();
            $stmt->close();
        }


        $conn->close();


        header('Location: settings_login-security.php');
        exit();
    }
}

?>
