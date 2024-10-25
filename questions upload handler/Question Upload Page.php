<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../admin/login.php");
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
    <title>Admin upload question</title>
    <style>
      * {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body {
        background: #d3eaff;
        font-family: Arial, Helvetica, sans-serif;

      }

      /* HEADER AND SIDEBAR */
      /* HEADER */
      .header {
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
      #upload_question {
        background: #497ba8;
      }
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
      /* CONTENT */
      div.content-1 {
        width: 87.5%;
        height: 18rem;
        position: absolute;
        top: 5.5rem;
        left: 10.6rem;
        border-radius: 15px;
      }
      /* ------------------------- */
      h1 {
        color: #0047ab; /* Dark blue heading color */
      }
/*form */
.container_clip1 {
    position: absolute;
    left: 25%;
    top: 15%;
}

.container_clip1 textarea {
    font-size: 16px;
  
}.container_clip1 input {
    font-size: 16px;
 
}
      form {
    
        line-height: 1.5rem;
        width: 1040px;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      label {
        font-weight: bold;
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif;
      }
.input_question input:hover,textarea:hover {
    border: 1.5px solid #62a0d8;
 
}
      input[type="text"],
      input[type="submit"],
      textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1.5px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        transition: all 0.5s;
      }

      input[type="text"]:focus,
      textarea:focus {
        outline: none;
        border-color: #0058e1; /* Darker blue border when focused */
      }

      input[type="submit"] {
        background-color: #62a0d8; 
        color: black; 
        cursor: pointer;
        transition: all 0.5s;
        font-size: 16px;
        font-weight: bold;
      }

      input[type="submit"]:hover {
        background-color: #2e73e2;
        color: white; 
      }

      #responseMessage {
        margin-top: 10px;
        color: green; /* Green color for success message */
      }
/* ----end form */
      /* Button styles */
      .btn-container {
        position: absolute;
        right: -2%;
        top: 13%;
        transform: translate(-50%, -50%);
      }

      .btn-container button {
        background-color: #62a0d8;
        color: black;
        font-size: 15px;
        font-weight: bold;
        font-style: normal;
        padding: 17px 16px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.5s;
      }

      .btn-container button:hover {
        background-color: #2e73e2;
        color: white;
      }
   
    </style>
  </head>
  <body>
    <!-- TOGGLE SIDE BAR (HAMBUGER MENU) -->
    <div class="header">
      <!-- NAVIGATION BAR -->
      <div class="topnav">
        <!-- <a class="active" href="#">Login Security</a> -->
        <!-- <a href="#">Personal Info</a> -->
        <!-- <a href="#">About</a> -->
      </div>
      <!-- LOGO -->
      <!-- If kung nagkaroon ng error sa link ng img>= Homepage.html. Paki re-link na lang -->
      <div class="logo">
        <a href="home-page.html"
          ><img
            src="https://media.discordapp.net/attachments/1223234109283762271/1223234253110771783/Official_Logo.png?ex=663817ec&is=6636c66c&hm=70c6d7bb09221067e3494fadf9909faa9761d74d77217b0cb87e450b053962da&=&format=webp&quality=lossless&width=550&height=344"
            alt="Expired"
        /></a>
        <h3 style="font-weight: lighter">Upload Question</h3>
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
        <img
          src="https://i.imgur.com/jxaLgCp.png"
          alt="UI FILLED PROFILE"
        />
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
          <a
            href="../INDEX/questions upload handler/Question Upload Page.php"
            id="upload_question"
            ><ion-icon name="cloud-upload-outline"></ion-icon>Upload Question</a
          >
        </li>
        <li>
        <a href="../admin/registered_login.php"><ion-icon name="people-outline"></ion-icon>Registered user</a>
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
    <div class="btn-container">
    <button onclick="window.location.href='existing questions.php'">View Existing Questions</button>
    </div>
<div class="container_clip1">
    <h1>Add New Question</h1>
    <form id="addQuestionForm">
        <label for="table_select">Select Table:</label><br>
        <select id="table_select" name="table_select" required style="    font-size: 15px;
        background-color: #b7d8f9;">
            <option value="" selected disabled>Select Table</option>
    <!-- Existing tables with the same structure will be dynamically added here -->
    <option value="create_table">Create New Table</option>
        </select><br><br>
<div class="input_question">
        <label for="table_name">Table Name (if creating a new table):</label><br>
        <input type="text" id="table_name" name="table_name" style="display: none;"><br><br>

        <label for="question">Question:</label><br>
        <textarea id="question" name="question" rows="4" required></textarea><br><br>

        <label for="correct_answer">Correct Answer:</label><br>
        <input type="text" id="correct_answer" name="correct_answer" required><br><br>

        <label for="incorrect_answers">Incorrect Answers (comma-separated):</label><br>
        <input type="text" id="incorrect_answers" name="incorrect_answers" required><br><br>

        <label for="explanation">Explanation:</label><br>
        <textarea id="explanation" name="explanation" rows="4" required></textarea><br><br>

        <input type="submit" value="Add Question">
    </div>
    </form>
</div>
    <div id="responseMessage"></div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const tableSelect = document.getElementById("table_select");
        const tableNameInput = document.getElementById("table_name");

        // Fetch existing tables with the same structure
        fetch("fetch_tables.php")
          .then((response) => response.json())
          .then((data) => {
            data.forEach((table) => {
              const option = document.createElement("option");
              option.value = table;
              option.textContent = table;
              tableSelect.appendChild(option);
            });
          })
          .catch((error) => console.error("Error fetching tables:", error));

        tableSelect.addEventListener("change", function () {
          if (tableSelect.value === "create_table") {
            tableNameInput.style.display = "block";
            tableNameInput.required = true;
          } else {
            tableNameInput.style.display = "none";
            tableNameInput.required = false;
          }
        });

        document
          .getElementById("addQuestionForm")
          .addEventListener("submit", function (event) {
            event.preventDefault();
            const form = new FormData(this);

            fetch("create_question.php", {
              method: "POST",
              body: form,
            })
              .then((response) => response.text())
              .then((message) => {
                document.getElementById("responseMessage").textContent =
                  message;
                document.getElementById("addQuestionForm").reset();
              })
              .catch((error) => console.error("Error:", error));
          });
      });
    </script>
  </body>
</html>
