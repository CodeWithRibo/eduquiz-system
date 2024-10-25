<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" type="text/css" href="/EduQuiz/CSS/dashboard.css" /> -->
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>

    <title>Admin Dashboard</title>
    <style>
      @import url(https://db.onlinewebfonts.com/c/c99c1c85532dbaf7bc549b3d45836ee6?family=Ahkio+W00+Regular);
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
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
        width: 6rem;
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

      /* SIDEBAR */
      .sidebar {
        background: #62a0d8;
        height: 100%;
        width: 228px;
        position: fixed;
        margin-top: 40px;
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
        list-style: none;

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
      /* CONTENT */
      div.content-1 {
        width: 87.5%;
        height: 18rem;
        position: absolute;
        top: 5.5rem;
        left: 10.6rem;
        border-radius: 15px;
      }
      /* TABLE ROW */
      .content-table {
        border-collapse: collapse;
        position: absolute;
        left: 15%;
        top: 21%;
        width: 74%;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
      }

      .content-table thead tr {
        background-color: #62a0d8;
        color: #ffffff;
        text-align: left;
        font-weight: bold;
      }

      .content-table th,
      .content-table td {
        padding: 12px 15px;
      }

      .content-table tbody tr {
        border-bottom: 1px solid #dddddd;
      }

      .content-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
      }

      .content-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
      }

      .content-table tbody tr.active-row {
        color: black;
      }
      /* card total of register user and total of submit contact form */
      .total_card {
        text-align: center;
        background: #497ba8;
        padding: 8px;
        width: 400px;
         border-radius: 5px;
        transition: all 0.5 ease-in-out;
      }
      .total_card:hover {
        background-color: #62a0d8;
        opacity: 0.8;
      }
      .total_card h1 {
        margin-right: 8rem;
      }
      #icon- {
        margin-right: 6rem;
        font-size: 3rem;
      }
      .total_card a {
        text-decoration: none;
        color: black;
        font-size: 15px;
      }
      .total_container {
        display: flex;
    flex-wrap: wrap;
    text-align: start;
    justify-content: start;
    position: absolute;
    left: 15%;
    top: 15%;
    gap: 5rem;
      }
    </style>
  </head>
  <body>
    <!-- PHP Scripts -->
   <?php include_once('get_total_users.php'); ?>
   <?php include_once('get_total_contacts.php'); ?> 
   <?php include_once('get_total_topics.php'); ?>

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
        <h3 style="font-weight: lighter">Admin Dashboard</h3>
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
          <a href="#"><ion-icon name="home-outline"></ion-icon>Home</a>
        </li>
        <li>
          <a href="../admin/contactForm.php"
            ><ion-icon name="people-outline"></ion-icon>Contact Form 
            </a
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
    <div class="total_container">
      <!-- total registered user -->

      <div class="total_card">
        <h1>
          <ion-icon name="person-add-outline" id="icon-"></ion-icon><?php echo $totalUsers; ?>
        </h1>
        <a href="../Admin/registered_login.php">Total Registered User</a>
      </div>

      <!-- total contact form submited -->
      <div class="total_card">
        <h1>
          <ion-icon name="document-text-outline" id="icon-"></ion-icon><?php echo $totalContacts; ?>
        </h1>
        <a href="../Admin/contactForm.php">Total Contact Submitted </a>
      </div>
      <!-- total upload topics -->
      <div class="total_card">
        <h1>
          <ion-icon name="book-outline" id="icon-"></ion-icon><?php echo $totalTopics; ?>
        </h1> 
        <a href="../questions upload handler/existing questions.php">Total Topics in Animation </a>
      </div>
      <!--  -->
 
    </div>
  </body>
</html>
