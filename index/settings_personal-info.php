<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../logout/home-page.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/settings_personal-info.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="../js/index.js"></script>
    <title>Settings</title>
    <style>
form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    position: relative;
    left: 9.5%;
    top: 3rem;
}
    </style>
</head>
<body>

<!-- ---------HEADER---------- -->
<div class="header">
    <!-- NAVIGATION BAR -->
    <div class="topnav" id="topnav">
    <img onclick="Settings()" src="https://i.imgur.com/jxaLgCp.png" alt="user" >          
            <a class="active" href="../index/home-page.php" onclick="MyfunctionLogin()">Contact Us</a>
            <a href="../index/about.php">About</a>
            <a href="../index/quizzes.php">Quizzes</a>
            <a href="../index/home-page.php">Home</a>
    </div>
</div>
<script>
          function Settings() {
          window.location = "../index/settings_personal-info.php";}
      </script>
<div class="logo">
    <a href="home-page.php"><img onclick="MyFunction()"style="cursor:pointer;" src="https://i.imgur.com/mVR6QsO.png" alt="Logo"></a>
    <h3>EduQuiz</h3>
</div>

<!-- ------------------- -->

<!--  -->
<div class="hero">
    <div class="container_1">
        <h1>Settings</h1>
        <a href="../index/settings_personal-info.php" id="id_1">Personal Info</a>
        <a href="../index/settings_login-security.php" id="id_2">Login & Security</a>
        <!-- HR > Horizontal Rule (Line)  -->
        <span class="hr_1"> <hr></span>
        <span class="hr-faq">
            <hr>
        </span>
    </div>


    <div class="container_3" style="positive:relative; left:10%;">
    <div class="edit_name">
        <form action="update_profile.php" method="POST">
            <label for="new-firstname">First Name:</label>
            <input type="text" name="new-firstname" id="new-firstname" required>
            <label for="new-lastname">Last Name:</label>
            <input type="text" name="new-lastname" id="new-lastname" required>
            <button type="submit" class="btn-change-name" id="id-name">Save</button>
        </form>
    </div>
</div>
</body>
</html>