<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: ../Index/home-page.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/Signup.css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="../js/index.js"></script>
    <title>Signup</title>
    <style>
    body {
  font-family: "Ahkio W00 Regular";
  background-image: url(https://i.imgur.com/SkE0lHM.png);
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100%;
}
</style>
</head>
<body>
    <!-- BRAIN IMAGE -->
    <div class="ImageBrain">
    <img src="https://i.imgur.com/rMvjv88.png" alt="Brain"/>
    </div>
    <!-- HEADER -->
    <div class="header">
        <!-- LOGO -->
        <div class="logo">
        <img src="https://i.imgur.com/mVR6QsO.png" alt="Logo" />
           <div class="heading-2"> <h2>EduQuiz</h2></div> 
        </div>

     
    </div>
    <div class="containerForm">
        <div class="heading-content">
            <div class="heading-1"> <h1>Create an Account</h1></div>  
            <div class="heading-2"> <h3>Already have an account? <a href="../login/login.php">Login</a></h3></div> 
        </div>
        <form action="signup_process.php" method="post" id="form">
            <div class="fullname">
                <span class="firstname">
                    <!-- FIRST NAME -->
                    <label for="firstname">First Name</label>
                    <input type="text" id="firstname" name="firstname" required />
                </span>
                <!-- LAST NAME -->
                <span class="lastname">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" required />
                </span>
            </div>
            <!-- EMAIL -->
            <div class="email_address">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required />
            </div>

            <!-- PASSWORD -->
            <div class="Password">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required />
            </div>

            <!-- REPEAT-PASSWORD -->
            <div class="RepeatPassword">
                <label for="RepeatPassword">Repeat Password</label>
                <input type="password" id="repeatpassword" name="repeatpassword" required />
            </div>
            <div class="btn-signup">
                <button type="submit" name="signup" id="submit">Sign Up</button>
            </div>
        </form>
    </div>
</body>
</html>
