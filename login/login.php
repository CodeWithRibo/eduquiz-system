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
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="../js/index.js"></script>
    <style>
    body {
  font-family: "Ahkio W00 Regular";
  background-image: url(https://i.imgur.com/SkE0lHM.png);
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100%;
}
</style>
    <title>Login</title>
</head>
<body>
    <!-- CONTAINER -->
    <div class="container">
        <!-- BRAIN IMAGE -->
        <div class="ImageBrain">
            <img src="https://i.imgur.com/rMvjv88.png" alt="brain"/>
        </div>
        <!-- LOGO -->
        <div class="logo">
            <img src="https://i.imgur.com/mVR6QsO.png" alt="Logo" />
            <div class="heading-2"> <h2>EduQuiz</h2></div> 
        </div>
    
    </div>
    <!-- LOGIN -->
    <div class="ContainerForm">
            <div class="heading">
            <h1>Login</h1>
            <h2>Doesn’t have an account yet? <a href="../signup/SignUp.php">Sign Up</a></h2>
        </div>
        <form action="login_process.php" method="POST" id="form">
            <!-- EMAIL ADDRESS  -->
            <div class="email_address">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="" required />
            </div>
            <!-- PASSWORD -->
            <div class="password">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="" required />
                <!-- SHOW PASSWORD -->
                <span class="showPass" onclick="myFunction()" title="Show Password">
                    <i id="hide1" class="fa fa-eye"></i>
                    <i id="hide2" class="fa fa-eye-slash"></i>
                </span>
            </div>
            <!-- REMEMBER ME  -->
            <div class="remember">
                <input type="checkbox" id="rememberMe" name="rememberme" />
                <label for="rememberme">Remember me</label>
            </div>
            <div class="btn-login">
                <button type="submit" name="login" id="submit"  onclick="lsRememberMe()">Login</button>
            </div>
        </form>     
    </div>

    <!-- SHOW PASSWORD JS SCRIPT-->
    <script>
            const rmCheck = document.getElementById("rememberMe"),
    emailInput = document.getElementById("email");

if (localStorage.checkbox && localStorage.checkbox !== "") {
  rmCheck.setAttribute("checked", "checked");
  emailInput.value = localStorage.username;
} else {
  rmCheck.removeAttribute("checked");
  emailInput.value = "";
}

function lsRememberMe() {
  if (rmCheck.checked && emailInput.value !== "") {
    localStorage.username = emailInput.value;
    localStorage.checkbox = rmCheck.value;
  } else {
    localStorage.username = "";
    localStorage.checkbox = "";
  }
}
    </script>
    <script>
    
        function myFunction() {
            var x = document.getElementById("password");
            var y = document.getElementById("hide1");
            var z = document.getElementById("hide2");

            if (x.type === "password") {
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            } else {
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }
        }
    </script>
</body>
</html>
