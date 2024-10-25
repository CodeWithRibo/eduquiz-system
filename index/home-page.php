<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../logout/home-page.php');
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "eqs_users";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user's first name from the database based on user ID
$user_id = $_SESSION['user_id'];


$sql = "SELECT firstname FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $firstname = $row['firstname'];

    $_SESSION['firstname'] = $firstname;
} else {

    $_SESSION['firstname'] = 'Guest';
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../css/home-page.css" />
    <link rel="stylesheet" type="text/css" href="../css/login/home-page.css">
    <link rel="stylesheet" type="text/css" href="../css/template/scrollbar.css" />
    <link rel="stylesheet" type="text/css" href="../css/template/scrollup.css" />
    <link rel="shortcut icon" href="https://scontent.fmnl17-2.fna.fbcdn.net/v/t1.15752-9/416254564_229762756884500_5050083700608708339_n.png?_nc_cat=111&ccb=1-7&_nc_sid=8cd0a2&_nc_eui2=AeEMt8jjZTEtn_GreL2TVYG8S7TkXl5c5JZLtOReXlzklhk0dDkNwv--04WqKhenVzWebcEiajVdeM3ne_fAydVy&_nc_ohc=iRyVOQvgDXAAX8b7Hwp&_nc_ht=scontent.fmnl17-2.fna&oh=03_AdSe7B8d5Ia9g3NJSZBi1B2VW__Dghbi7LYl4iHnyu6-sA&oe=6603A7DE" type="image/x-icon">
    <script src="../js/index.js"></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <title>Homepage</title>
    <style>
      div.content-1 {
  height: 200px;
  background: rgb(48, 60, 127);
  background: linear-gradient(90deg, rgba(48, 60, 127, 1) 7%, rgba(98, 195, 216, 1) 91%);
  width: 88.5%;
  height: 20rem;
  position: absolute;
  top: 5.5rem;
  left: 7.2rem;
  border-radius: 15px;
}
    </style>
  </head>
<!-- ---------HEADER---------- -->
    <div class="header">
      <!-- NAVIGATION BAR -->
      <script>
        function Settings() {
  window.location = "../index/settings_personal-info.php";
}

      </script>
      <div class="topnav" id="topnav">
        <img onclick="Settings()" src="https://i.imgur.com/20povXF.png" alt="user" >     
            <a class="active" href="#form">Contact Us</a>
            <a href="#about">About</a>
            <a href="quizzes.php">Quizzes</a>
            <a href="home-page.php">Home</a>
    </div>
      </div>
      <div class="logo"><img onclick="MyFunction()"style="cursor:pointer;" src="https://i.imgur.com/mVR6QsO.png" alt="Logo">
      <h3>EduQuiz</h3>
    </div>

<!-- ------------------- -->

<!-- CONTENT -->
    <div class="content-1"> 
        <!-- DITO MALALAGAY YUNG USERNAME PAG NAG SIGN UP SI USER  --> <!-- Hello <php?>Guest</php?>-->
         <!-- TEMPORARY NOT AVAILABLE (BACKEND DEV CAN ONLY CHANGE THIS....-CJ) -->
      <div class="intro">
      <p>Hello, <?=$_SESSION['firstname']?> </p>
            <h1>Let's put ourselves to a challenge and get learning!</h1>
      </div>
      <!-- SEARCH TOPIC -->
      <div class="search-bar">
        <input type="text"class="icon" id="search" placeholder="Search any topic you like" onkeyup="myFunction()">
      </div>
    </div>
    <script type="text/javascript">
        function myFunction() {
          let filter = document.getElementById("search").value.toUpperCase();
          let item = document.querySelectorAll(".child-adobe");
          let theme = document.querySelectorAll(" .parent-adobe-2");
          let l = document.getElementsByTagName("h2");
          for (var i = 0; i <= l.length; i++) {
            let a = item[i].getElementsByTagName("h2")[0];
            let value = a.innerHTML || a.innerText || a.textContent;
            if (value.toUpperCase().indexOf(filter) > -1) {
              item[i].style.display = "";
              theme[i].style.display = "";

            } else {
              item[i].style.display = "none";
              theme[i].style.display = "none";
             
            }
          }
        }
      </script>
<!-- --------------- -->
    <div class="parent-adobe">
                    <!-- -------- Introduction to Adobe Photoshop-------------->
      <div class="child-adobe">
      <div class="adobe-img">
      <img src="https://i.imgur.com/oIc6wso.png" alt="Adobepic">
        <div class="adobe-text">
           <span class="span_p-1"><p>10 items</p></span>
           <span class="span_h2-1"><h2>Introduction to Adobe Photoshop</h2></span>
           <span class="span_h3-1"><h3>This quiz provides fundamental knowledge related to Adobe Photoshop.  </h3> </span>
        <span class="span_btn-1"><a href="../Environment of Adobe Photoshop/index.php"><button>Start Now<ion-icon name="chevron-forward-outline" id="ion-1"></ion-icon></button></a></span>   
        </div>
      </div>
    </div>
                                    <!---------------------- -->
                  <!-- ------------ History of Adobe Photoshop---------------->
    <div class="child-adobe"> 
      <div class="adobe-img">
      <iframe width="451" height="451" src="https://www.youtube.com/embed/cwk3O19rItQ" title="A Visual History of Adobe Photoshop" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        <div class="adobe-text">
           <span class="span_p-1"><p>15 items</p></span>
           <span class="span_h2-1"><h2>History of Adobe Photoshop<h2></span>
           <span class="span_h3-1"><h3>Press your knowledge of Adobe Photoshop's history to the limit</h3> </span>
         <span class="span_btn-1"> <a href="../History of Adobe Photoshop/index.php"><button>Start Now<ion-icon name="chevron-forward-outline" id="ion-1"></ion-icon></button></a></span> </div>
      </div>
    </div>
                                  <!------------------------>
               <!-- ------------ Different Tools in Adobe Photoshop---------------->
                   
    <div class="child-adobe">
      <div class="adobe-img">
      <img src="https://i.imgur.com/63Cbgc4.png" alt="Adobepic">
        <div class="adobe-text">
           <span class="span_p-1"><p>20 items</p></span>
           <span class="span_h2-1"><h2>Different Tools in Adobe Photoshop</h2></span>
           <span class="span_h3-1"><h3>This quiz provides insights about the different tools in Adobe Photoshop and their functions. </h3> </span>
           <span class="span_btn-1"><a href="../Different Tools in Adobe Photoshop/index.php"> <button>Start Now<ion-icon name="chevron-forward-outline" id="ion-1"></ion-icon></button></a></span> </div>
      </div>
    </div>
    <div class="btn-morequiz">
    <a href="../index/quizzes.php"><button>More Quiz</button></a>
    </div>
    <!-- -------contact us----------- -->
    <div class="contactus-form" id="form">
 
    <div class="contactus-h1">
      <h1>Let me know what's on your mind</h1>
    </div>
      <form id="contactForm" method="POST" action="contact_form_handler.php">
        <div class="label-fullname">
          <label for="firstname" id="label_firstname">Firstname</label>
          <label for="lastname" id="label_lastname">Lastname</label>
        </div>
        <!-- FULLNAME -->
        <div class="input-fullname">
          <input type="text" id="firstname" name="firstname" placeholder="First Name" required />
          <input type="text" id="lastname" name="lastname" placeholder="Last Name" required />
        </div>
      <!-- EMAIL ADDRESS -->
        <div class="email_address">
            <div class="label-email_address"><label for="label-email_address">Email Address</label></div>
          <input type="email" id="email" name="email" placeholder="Email Address" required>
        </div>
        <!-- LEAVE US A MESSAGE -->
        <div class="message">
          <div class="label-message">
            <label for="message">Leave us a message...</label>
          </div>
          <textarea name="message" id="message" cols="30" rows="10" required></textarea>    
        </div>
        <!-- SUBMIT BUTTON -->
        <div class="btn-submit">
          <button>Submit</button>
        </div>
      </form>
          <!-- FOOTER -->
        <span class="footer">
          <footer> <a href="#topnav">© 2024 by EduQuiz. Powered and secured by ___</a></footer>
          <span class="scroll-up"><a href="#topnav"><ion-icon name="chevron-up"></ion-icon></a></span>
        </span>
  
    </div>
    <!-- -------------------- -->
    </div> <!-- PARENT-1 DIV -->
  <div class="parent-adobe-2"> <!-- PARENT-2  -->
    <div class="child-adobe-2">
    <div class="child-adobe-text_2">
      <h1>Learn about Adobe Photoshop with EduQuiz</h1>
    </div>
    <div class="child-adobe-img_2">
    <img src="https://i.imgur.com/ChmFeiJ.png" alt="Intro Adobephoto Pic">
    </div>
    <div class="child-adobe-lorem">
      <p>EduQuiz helps you test your designing skills, specifically with Adobe Photoshop. It's all about seeing how well you can create designs using this software. You'll find quizzes and challenges that let you practice different techniques, from basic to advanced, all within Adobe Photoshop. Whether you're just starting out or you're already experienced, EduQuiz is a great way to learn and improve your designing skills with Adobe Photoshop.</p>
    </div>
  </div>
  <!-- ABOUT -->
  <div class="child-adobe-3">
    <div class="child-adobe-text_3" id="about">
  <div class="child-adobe_h1"><h1>About</h1>
    </div>
    <div class="child-adobe_p"> <p>EduQuiz explores the effectiveness of online quizzes, particularly focusing on Adobe Photoshop, to evaluate students' grasp of graphic design concepts. Each quiz covers various aspects of Photoshop, aiming to assess comprehension and practical application. By offering an interactive and self-paced learning environment, EduQuiz aims to enhance engagement, motivation, and overall learning outcomes, representing a pioneering effort in leveraging technology for effective education in the digital age.</p>
</div> 
<div class="read-more"> 
  <a href="../index/about.php">Read more ></a>
</div>
    </div>
  </div>
  </div>
  <script>
    function submitForm(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        // Get form data
        let form = document.getElementById('contactForm');
        let formData = new FormData(form);

        // Send form data to server using fetch API
        fetch(form.action, {
            method: form.method,
            body: formData
        })
        .then(response => {
            if (response.ok) {
                // Display success message in popup
                alert("Your message has been sent successfully!");
                form.reset(); // Clear the form after successful submission
            } else {
                // Display error message in popup
                alert("Error sending message. Please try again.");
            }
        })
        .catch(error => {
            // Display error message in popup
            alert("Error sending message. Please try again.");
        });
    }

    document.getElementById('contactForm').addEventListener('submit', submitForm);
    </script>
  </body>
</html>
