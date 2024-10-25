<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "eqs_users"; 



$mysqli = new mysqli($servername, $username, $password, $database);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


if (isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_page.php"); 
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];


    $sql = "SELECT * FROM AdminAccounts WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();

    if ($admin && $password == $admin['password']) { 
        $_SESSION['admin_logged_in'] = true; 
        header("Location: admin_page.php"); 
        exit;
    } else {
        $error_message = "Invalid username or password";
    }
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
.heading {
    position: absolute;
    bottom: 7rem;
    left: 6%;
    width: 500px;

     }
     .btn-login button {
    font-family: "Ahkio W00 Regular";
    position: absolute;
    left: 1%;
    top: 12rem;
    border: none;
    background-color: #2b4359;
    color: white;
    font-size: 25px;
    border-radius: 5px;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-right: 10.7rem;
    padding-left: 10.5rem;
    cursor: pointer;
}
</style>
    <title>Admin Login</title>
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
            <h1>Administration Account</h1>
        </div>
        <form  method="POST" action="login.php" id="form">
            <!-- username  -->
            <div class="email_address">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="" required />
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
                <!-- <input type="checkbox" id="rememberMe" name="rememberme" /> -->
                <!-- <label for="rememberme">Remember me</label> -->
            </div>
            <div class="btn-login">
                <button type="submit" name="login" id="submit">Login</button>
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








<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style></style>
</head>
<body>
    <h1>Login</h1> -->
    <!-- <?php if (isset($error_message)) echo "<p>$error_message</p>"; ?> -->
    <!-- <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html> -->
