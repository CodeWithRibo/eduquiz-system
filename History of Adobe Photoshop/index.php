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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../Different Tools in Adobe Photoshop/style.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>EduQuiz Animation</title>
    <style>
    </style>
  </head>
  <body>
  <!-- TOGGLE SIDE BAR (HAMBUGER MENU) -->
  <div class="header">
    <!-- NAVIGATION BAR -->
    <div class="topnav">
      <a href="../logout/logout.php">Logout</a>
      <!-- <a class="active" href="#">Login Security</a> -->
      <!-- <a href="#">Personal Info</a> -->
    </div>
    <!-- LOGO -->
    <div class="logo">
      <a href="home-page.html"
        ><img src="https://i.imgur.com/mVR6QsO.png" alt="Expired"
      /></a>
      <h3>History Of Adobe Photoshop</h3>
    </div>
  </div>
    <div class="container-2">
        <a class="exit-btn"href="../index/quizzes.php"><button>Exit</button></a>
      
    </div>
    <!-- -Container- -->
    <div class="container">
      <div class="start-screen">
        <h1 class="heading">EduQuiz Animation</h1>
        <div class="settings">
          <label for="num-questions">Number of Questions:</label>
          <select id="num-questions">
            <option value="15">15</option>
          </select>
          <label for="category">Type of Quiz:</label>
          <select id="category">
            <option value="category">
            History Of Adobe Photoshop
            </option>
          </select>
          <label for="difficulty">Difficulty:</label>
          <select id="difficulty">
            <option value="easy">easy</option>
          </select>
          <label for="time">Time per question:</label>
          <select id="time">
            <option value="15">15 seconds</option>
          </select>
        </div>
        <button class="btn start">Start Quiz</button>
      </div>     
      <div class="quiz hide">
        <div class="timer">
          <div class="progress">
            <div class="progress-bar"></div>
            <span class="progress-text"></span>
          </div>
        </div>
        <div class="question-wrapper">
          <div class="number">
            Question <span class="current">1</span>
            <span class="total">/10</span>
          </div>
          <div class="question">This is a question This is a question?</div>
        </div>
        <div class="answer-wrapper">
          <div class="answer selected">
            <span class="text">answer</span>
            <span class="checkbox">
              <i class="fas fa-check"></i>
            </span>
          </div>
        </div>
        <button class="btn next">Next</button>
      </div>

      <div class="end-screen hide">
        <h1 class="heading">EduQuiz Animation</h1>
        <div class="score">
          <span class="score-text">Your score:</span>
          <div>
            <span class="final-score" style="color:#100c08; ">0</span>
            <span class="total-score" style="color:#100c08; ">/10</span>
          </div>
        </div>
        <div class="button-gap">
          <button class="btn restart">Restart Quiz</button>
        <div class="btn-show">
           <button class="h2_show" onclick="myFunction()">Finalization</button>
           </div>
      </div>
    </div>
    <!-- js -->
    <script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
  <!-- end js -->
   </div>
   <div class="show_answer"  id="myDIV">
    <div class="container_show_answer">
    <h1>Finalization</h1>
    <span class="exit_btn-answer" onclick="myFunction()" ><ion-icon name="exit-outline"></ion-icon></span>
    
    <?php
     $servername = "localhost";
     $username = "root"; 
     $password = ""; 
    $database = "eqs"; 

     
     // Create connection
 $conn = new mysqli($servername, $username, $password, $database);
 
 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 
 // read all row from database table
 $sql = "SELECT * FROM history_of_adobe_photoshop";
 $result = $conn->query($sql);
 
 if (!$result) {
     die("Invalid query: " . $conn->error);
 }
// read data of each row
while ($row = $result->fetch_assoc()) {
  echo "

      <p class='show_asnwer' id='correct_answer'> $row[id]. Correct Answer : $row[correct_answer]</p>
      <p class='show_asnwer' id='explanation'> Explanation :  $row[explanation]</p>
 
  ";
}
    ?> 
    </div>    
  </div>
   <!-- ------ -->
   <div class="remark">
    <!-- <p id="explanation-p" class="explanation" style="display: none;"> -->
  </div>
 

    <script src="script.js"></script>
  </body>
</html>
