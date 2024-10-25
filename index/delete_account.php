<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../logout/home-page.php');
    exit();
}

// $servername = "localhost:8888";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eqs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmed'])) {
    // Delete the user account from the database
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->close();

    session_unset();
    session_destroy();

    header('Location: ../logout/home-page.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Delete Account</title>
    <style>
        @import url(https://db.onlinewebfonts.com/c/c99c1c85532dbaf7bc549b3d45836ee6?family=Ahkio+W00+Regular);
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  font-family: "Ahkio W00 Regular";
  /* background-image: url(https://scontent.xx.fbcdn.net/v/t1.15752-9/423221555_917645847036311_5264040073845773924_n.png?stp=dst-png_s640x640&_nc_cat=105&ccb=1-7&_nc_sid=510075&_nc_eui2=AeGrGrnxpk8g_fzFsAQM7oZKyJ31HAYY1gbInfUcBhjWBi73rkSDbc9UT1N3Fs4xJcPyOPSgntNlKKODdlZeBgxA&_nc_ohc=Y9ZgM0Mcc4gAX8IrO6D&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=03_AdQhQIUp3bMNzXmTrEgkJi0sottamML3Qwho_2-1GDJNwg&oe=65F7E40D);
  background-repeat: no-repeat;
  background-size: cover;
  min-height: 100vh;
  background-position: center; */
  background: #d3eaff;
  scroll-behavior: smooth;
}
/* HR */

      /* SCROLL BAR */
      ::-webkit-scrollbar {
        width: 15px;
      }
      ::-webkit-scrollbar-thumb {
        border-radius: 8px;
        background: linear-gradient(
          90deg,
          rgba(48, 60, 127, 1) 7%,
          rgba(98, 195, 216, 1) 91%
        );
      }
      ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(
          90deg,
          rgba(48, 60, 127, 1) 7%,
          #62a0d8 80%
        );
      }

      /* HEADER */
      .header {
        background: #62a0d8;
        width: 100%;
        height: 70px;
        position: absolute;
        /* z-index: 12; */
      }
      /* LOGO AND H3 HEADING */
      div.logo {
        position: absolute;
        left: 10%;
      }
      .logo img {
        margin-left: 13px;
        width: 6.5rem;
        top: 0.5%;
      }
      .logo h3 {
        margin-left: 13px;
        position: relative;
        bottom: 3.5rem;
        left: 6rem;
        font-size: 35px;
        font-weight: lighter;
      }
      .topnav {
        overflow: hidden;
      }
      .topnav img {
        margin-right: 1rem;
        width: 4.5rem;
        float: right;
        text-align: center;
        padding: 0px 0px;
        cursor: pointer;
      }

      .topnav a {
        float: right;
        color: #000000;
        text-align: center;
        padding: 19px 50px;
        text-decoration: none;
        font-size: 21.5px;
        font-family: "Ahkio-Regular", cursive;
        cursor: pointer;
      }
      .topnav a:hover {
        background: #497ba8;
        padding: 19px 50px;
        transition: all 0.3s;
      }
        .container{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        display: flex;
        flex-direction: column;
        gap: 2rem;
        }
        .container p {
            font-size: 30px;
            font-family: "Ahkio-Regular", cursive;
            font-style: italic;
            font-weight: bold;
            width:1000px;
        }
        .container h1 {
        font-size: 70px;
        text-align: center;
        }
        .container button {
        align-items: center;
       
        margin-top: 1rem;
        width: 24%;
        padding: 10px 15px 15px 10px;
        border: none;
        font-size: 17px;
        font-family: "Ahkio-Regular", cursive;
        cursor: pointer;
        background-color: #62a0d8;
        border-radius: 5px;
        }
        .container button:hover {
        transition: all 0.5s;
        background-color: #497ba8;
        color: white;

}
.btn-delete {
  display: flex;
  justify-content: space-around;
}
    </style>
  </head>
  <body>
    <!-- HEADER -->
    <div class="header">
        <!-- NAVIGATION BAR -->
  
        <div class="topnav" id="topnav">
          <img
            onclick="Settings()"
            src="https://media.discordapp.net/attachments/1223234109283762271/1224680176718446733/PS.png?ex=661e5f4b&is=660bea4b&hm=611066f6aaa67b59175b7b9ef179bd17723cb31324c293d3ad4b169f80b14862&=&format=webp&quality=lossless&width=468&height=468"
            alt="Expired"
          />
          <a class="active" href="../login/home-page.php">Contact Us</a>
          <a href="../login/home-page.php">About</a>
          <a href="../login/quizzes.php">Quizzes</a>
        </div>
      </div>
      <div class="logo">
        <a href="../login/home-page.php">
        <img
          src="https://media.discordapp.net/attachments/1223234109283762271/1223234253110771783/Official_Logo.png?ex=66191cac&is=6606a7ac&hm=f996b48bc14ba106972437901e41dbd8cdc0d9c528a675cab5d37c92a544ec1a&=&format=webp&quality=lossless&width=550&height=344"
          alt=""
        /></a>
        <h3>EduQuiz</h3>
      </div>
    <!-- ------------------- -->
      <div class="container">
        <h1>Delete Account</h1>
        <p>This action cannot be undone. Are you sure you want to proceed?</p>
        <form id="deleteForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="confirmed" value="true">
            <div class="btn-delete">
            <button type="button" onclick="confirmDelete()">Yes</button>
            <button type="button" onclick="noDelete()">No</button>

              </div>
          </form>
        </div>
  
  
  <script>
      function confirmDelete() {
        var confirmation = confirm(
          "Are you sure you want to delete your account?"
        );
        if (confirmation) {
          document.getElementById("deleteForm").submit();
        }
      }

      function noDelete() {
                window.location = "settings_login-security.php"
              }
    </script>
  </body>
</html>