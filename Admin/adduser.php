<?php 
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "eqs_users"; 


$conn = new mysqli($servername, $username, $password, $database);


$firstname = "";
$lastname = "";
$email = "";
$password = "";

$errorMessage="";
$successMessage="";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    do {
        if (empty($firstname) || empty($lastname) || empty($email) || empty($password)) {
            $errorMessage ="";
            break;
        }
$sql = "INSERT INTO users (firstname, lastname, email, password)" . "VALUES ('$firstname','$lastname','$email','$password')";
$result = $conn->query($sql);

if (!$result) {
    $errorMessage = "Invalid query: " . $conn->error;
    break;
}


            $firstname = "";
            $lastname = "";
            $email = "";
            $password = "";
           
            $errorMessage="Add new User added correctly";

    header("location: ../admin/adduser.php");

    }while(false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Add user</title>
   
<style>
    * {
        margin:0;
        padding:0;
        box-sizing: border-box;    }
 body {
  background: #d3eaff;
  font-family: Arial, Helvetica, sans-serif;
}
/* HEADER */
.header {
  z-index: 12;
  background: #62a0d8;
  width: 100%;
  height: 70px;
  position: fixed;
  border-bottom: 1px solid black;
  
}
/* LOGO AND H3 HEADING */
div.logo {
  position: relative;
  left: 10%;
}
.logo img {
  margin-left: 13px;
  width: 6.0rem;
  display: inline-flex;
  position: fixed;
  top: 0.5%;
}
.logo h3 {
  margin-left: 13px;
  display: inline-flex;
  position: fixed;
  top: 2.1%;
  left: 15.1%;
  font-size: 28px;
  font-weight: lighter;
  font-style: normal;
}
.topnav {
  overflow: hidden;
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
#Registered_login {
    background: #497ba8;
}
/* SIDEBAR */
.sidebar {
  background: #62a0d8;
  height: 100%;
  width: 228px;
  position: fixed;
  margin-top: 30px;
  transform: translateX(-250px);
  transition: transform 250ms ease-in-out;
}
/* PROFILE */
.profile {
  text-align: center;
  padding: 20px;
}
.profile img {
  width: 100px;
  height: 100px;
  object-fit: cover;
  object-position: top;
  cursor: not-allowed;
}

/* MENU BAR (HOME, CREATE, LIBARARY, SETTING */
.menu li a {
  text-decoration: none;
  color: #000000;
  display: block;
  padding: 30px;
  font-size: 17px;

  font-family: "Ahkio-Regular", cursive;
}
.menu li a:hover {
  background: #497ba8;
  transition: all 0.3s;
}
/* TOGGLE-ICON (HAMBURGER MENU 3 BAR) */
.toggle-icon div {
  background: #000000;
  width: 100%;
  height: 3px;
  transition: all 0.3s;
}
.toggle-icon {
  position: absolute;
  top: 22px;
  left: 59px;
  width: 25px;
  height: 5rem;
  z-index: 9999;
  cursor: pointer;
  transition: all 0.3s;
}
.bar-center {
  margin: 3px 0;
}
/* TOGGLE SIDEBAR ANIMATION (HAMBURGER MENU) */
input[type="checkbox"]:checked ~ .sidebar {
  transform: translateX(0);
}

input[type="checkbox"]:checked ~ .toggle-icon > .bar-top {
  transform: rotate(135deg);
  margin-top: 8px;
}
input[type="checkbox"]:checked ~ .toggle-icon > .bar-center {
  opacity: 0;
}

input[type="checkbox"]:checked ~ .toggle-icon > .bar-bottom {
  transform: rotate(-135deg);
  margin-top: -12px;
}
form {
position:absolute;
left: 35%;
    top: 25%;
    box-shadow: -1px 5px 70px -4px rgba(0,0,0,0.47);
-webkit-box-shadow: -1px 5px 70px -4px rgba(0,0,0,0.47);
-moz-box-shadow: -1px 5px 70px -4px rgba(0,0,0,0.47);
background:white;
width: 533px;
height: 529px;
    text-align: center;
  border-radius: 10px;
  background:#badeff;


}
.form_container input:hover {
  border-color: rgb(14, 132, 211);
    outline-color: #00a2ff;
    border: 1.5px solid rgb(35, 168, 221);
}
.form_container input:focus {
  border-color: rgb(14, 132, 211);
    outline-color: #00a2ff;
    border: 1.5px solid rgb(35, 168, 221);
}
.form_container label {
  font-size: 18px;
  line-height: 3rem;

}
.form_container a {
  text-decoration: none;
    color: white;
    position: relative;
    top: 1.5rem;
    left: 0rem;
    font-size: 20px;
    background: #2B4365;
    padding: 7px;
    border-radius: 4px;
}
input {
  width: 415px;
    height: 2.2rem;
    border: solid 1.5px black;
    border-radius: 5px;
 
    padding: 25px 0 20px 19px;
    font-size: 20px;
}
button {
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
    margin-top: 2rem;
}
.con_h2 h2 {
    position: absolute;
    width: 531px;
    left: 35%;
    top: 20.3%;
    font-size: 30px;
    font-family: arial;
    background: aliceblue;
    padding: 9px;
    text-align: center;
    border-radius: 6px;
    box-shadow: -38px 5px 92px -4px rgba(0, 0, 0, 0.47);
    -webkit-box-shadow: -38px 5px 92px -4px rgba(0, 0, 0, 0.47);
    -moz-box-shadow: -38px 5px 92px -4px rgba(0, 0, 0, 0.47);
}
</style>
</head>
<body>
     <!-- TOGGLE SIDE BAR (HAMBUGER MENU) -->
     <div class="header">
      <!-- NAVIGATION BAR -->
      <div class="topnav">
        <a href="../admin/logout.php">Logout</a>
        <!-- <a class="active" href="#">Login Security</a> -->
        <!-- <a href="#">Personal Info</a> -->
      </div>
      <!-- LOGO -->
      <div class="logo">
        <a href="home-page.html"
          ><img src="https://i.imgur.com/mVR6QsO.png" alt="Expired"
        /></a>
        <h3 style="font-weight: lighter">Add new user</h3>
      </div>
    </div>

    <!-- TOGGLE ICON  -->
    <input type="checkbox" class="togggle-sidebar" id="togggle-sidebar" />
    <label for="togggle-sidebar" class="toggle-icon">
      <div class="bar-top"></div>
      <div class="bar-center"></div>
      <div class="bar-bottom"></div>
    </label>

    <div class="sidebar">
      <div class="profile">
        <img src="https://i.imgur.com/jxaLgCp.png" alt="UI FILLED PROFILE" />
      </div>
      <ul class="menu">
        <li>
          <a href="../admin/admin_page.php"><ion-icon name="home-outline"></ion-icon>Home</a>
        </li>
        <li>
          <a href="../admin/contactForm.php"
            ><ion-icon name="people-outline"></ion-icon>Contact Form</a
          >
        </li>
        <li>
          <a href="../questions upload handler/Question Upload Page.php"
            ><ion-icon name="cloud-upload-outline"></ion-icon>Upload Question</a
          >
        </li>
        <li>
          <a href="../admin/registered_login.php"
            ><ion-icon name="people-outline"></ion-icon>Registered user</a
          >
        </li>
        <li>
          <a href="../admin/adduser.php"><ion-icon name="person-add-outline"></ion-icon>Add new user</a>
        </li>
        <li>
          <a href="../questions upload handler/existing questions.php"><ion-icon name="finger-print-outline"></ion-icon>Existing Questions</a>
        </li>
        <li>
          <a href="../questions upload handler/display_questions.php"><ion-icon name="chatbox-ellipses-outline"></ion-icon>Display Questions</a>
        </li>
      </ul>
    </div>
    <div class="container my-5">
      <div class="con_h2">
    <h2>Add user</h2>
    </div>
    <div class="form_container">
    <form action="#" method="post" >
        <!-- FIRSTNAME -->
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Firstname</label>
    <div class="col-sm-6">
         <input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?> " requuired>
    </div>
    </div>
<!--LASTNAME -->
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Lastname</label>
    <div class="col-sm-6">
         <input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>"requuired>
    </div>
    </div>
<!--EMAIL -->
    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Email</label>
    <div class="col-sm-6">
         <input type="email" class="form-control" name="email" value="<?php echo $email; ?>"requuired>
    </div>
    </div>
  <!--PASSWORD -->

    <div class="row mb-3">
        <label class="col-sm-3 col-form-label">password</label value="<?php echo $password; ?>" requuired>
    <div class="col-sm-6">
         <input type="text" class="form-control" name="password">
    </div>
    </div>


<?php
            if (!empty($successMessage)) {
                echo "
                <div class='alert alert-primary' role='alert'>
                
               <strong>$successMessage</strong>
               </div> 
               ";
    
            }
?>


<!-- BUTTON -->
<div class="row mb-3">
    <div class="offset-sm-3 col-sm-3 d-grid">
    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </div>
</div>

<div class="row mb-3">
    <div class="offset-sm-3 col-sm-3 d-grid">
    <a href='../admin/admin_page.php' class='btn btn-primary btn-sm'>Cancel</a>
    </div>
</div>
    </form>
    </div>
    <?php 
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-primary' role='alert'>
            
           <strong>$errorMessage</strong>
           </div> 
            ";

        }
    ?> 
    </div>
   
</body>
</html>


