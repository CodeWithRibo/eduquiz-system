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
    <link rel="stylesheet" type="text/css" href="../css/login/settings_login-security.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <title>Settings</title>
</head>
<body>
    <!-- HEADER -->
    <div class="header">
        <div class="topnav">
            <img onclick="Settings()" src="https://i.imgur.com/jxaLgCp.png" alt="user">
            <a class="active" href="../index/home-page.php">Contact Us</a>
            <a href="../index/about.php">About</a>
            <a href="../index/quizzes.php">Quizzes</a>
            <a href="../index/home-page.php">Home</a>
        </div>
        <div class="logo">
            <a href="../index/home-page.php">
                <img src="https://i.imgur.com/mVR6QsO.png" alt="Logo">
            </a>
            <h3>EduQuiz</h3>
        </div>
    </div>

    <!-- SETTINGS CONTENT -->
    <div class="hero">
        <div class="container_1">
            <h1>Settings</h1>
            <a href="../index/settings_personal-info.php" id="id_1">Personal Info</a>
            <a href="../index/settings_login-security.php" id="id_2">Login & Security</a>
            <span class="hr_1"> <hr></span>
            <span class="hr-faq">
                <hr>
            </span>
        </div>
    <!-- CHANGE EMAIL FORM -->
        <div class="container_2">
            <form action="update_security.php" method="POST">
                <input type="hidden" name="form-type" value="email">
                <div class="edit_email">
                    <label for="new-email">New Email Address:</label>
                    <input type="email" name="new-email" id="new-email" required>
                </div>
                <div class="btn-container">
                    <button type="submit" class="btn-change" id="id-change-email">Change Email</button>
                </div>
            </form>
        </div>

    <!-- CHANGE PASSWORD FORM -->
        <div class="container_2">
            <form action="update_security.php" method="POST">
                <input type="hidden" name="form-type" value="password"> 
                <div class="edit_password">
                    <label for="new-password">New Password:</label>
                    <input type="password" name="new-password" id="new-password" required>
                </div>
                <div class="btn-container">
                    <button type="submit" class="btn-change" id="id-change-password">Change Password</button>
                </div>
            </form>
            <div class="rmv">
                <div class="lgt"><a href="../logout/logout.php">Logout</a></div> 
                <!-- <div class="pda"><a href="delete_account.php">Permanent delete Account</a></div> -->
            </div>
        </div>
    </div>
</body>
</html>
