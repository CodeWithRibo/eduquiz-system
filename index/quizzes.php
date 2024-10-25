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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/login/quizzes.css" />
    <link rel="stylesheet" href="../css/template/scrollbar.css" />

    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <title>Quizzes</title>
  </head>
  <body>
    <!-- HEADER -->
    <div class="header">
      <!-- NAVIGATION BAR -->

      <div class="topnav" id="topnav">
        <img
          onclick="Settings()"
          src="https://i.imgur.com/jxaLgCp.png"
          alt="Expired"
        />
      <script>
          function Settings() {
          window.location = "../index/settings_personal-info.php";}
      </script>
        <a class="active" href="../index/home-page.php">Contact Us</a>
        <a href="../index/about.php">About</a>
        <a href="../index/quizzes.php">Quizzes</a>
        <a href="../index/home-page.php">Home</a>
      </div>
    </div>
    <div class="logo">
      <a href="home-page.php">
      <img
        src="https://i.imgur.com/mVR6QsO.png"
        alt="Expired"
      /></a>
      <h3>EduQuiz</h3>
    </div>
    <!--  -->
      <!-- SEARCH TOPIC -->
      <form action="#" id="search-form">
      <div class="search-bar">
        <input type="text"class="icon" name="Searchbar" id="search"  onkeyup="myFunction()" placeholder="Search any topic you like" >
      </div>
      </form>
    <div class="parent-adobe">
      <!-- javascript search-bar -->       
      <script type="text/javascript">
        function myFunction() {
          let filter = document.getElementById("search").value.toUpperCase();
          let item = document.querySelectorAll(".child-adobe");
          let l = document.getElementsByTagName("h2");
          for (var i = 0; i <= l.length; i++) {
            let a = item[i].getElementsByTagName("h2")[0];
            let value = a.innerHTML || a.innerText || a.textContent;
            if (value.toUpperCase().indexOf(filter) > -1) {
              item[i].style.display = "";
            } else {
              item[i].style.display = "none";
            }
          }
        }
      </script>

      <!-- -------- Environment of Adobe Photoshop-------------->
<div class="child-adobe">
<div class="adobe-img">
<iframe width="451" height="451" src="https://www.youtube.com/embed/XRrQkskHENo" title="A Visual History of Adobe Photoshop" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
<div class="adobe-text">
<span class="span_p-1"><p>15 items</p></span>
<span class="span_p-1"><p>20 Seconds</p></span>
<span class="span_h2-1"><h2>Environment of Adobe Photoshop </h2></span>
<span class="span_h3-1"><h3>Challenge your understanding of Adobe Photoshop's user interface and workspace. </h3> </span>
<span class="span_btn-1"><a href="../Environment of Adobe Photoshop/index.php"><button>Start Now<ion-icon name="chevron-forward-outline" id="ion-1"></ion-icon></button></a></span>  
</div>
</div>
</div>
                      <!---------------------- -->
                    
                      <!---------------------- -->
<!-- -------- Different Tools in Adobephotoshop-------------->
<div class="child-adobe">
<div class="adobe-img">
<iframe width="451" height="451" src="https://www.youtube.com/embed/KAmSB5MQxOo" title="A Visual History of Adobe Photoshop" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
<div class="adobe-text">
<span class="span_p-1"><p>10 items</p></span>
<span class="span_p-1"><p>15 Seconds</p></span>
<span class="span_h2-1"><h2>Different Tools in Adobe photoshop</h2></span>
<span class="span_h3-1"><h3>Challenge your understanding of Adobe Photoshop's user interface and workspace. </h3> </span>
<span class="span_btn-1"><a href="../Different Tools in Adobe Photoshop/index.php"><button>Start Now<ion-icon name="chevron-forward-outline" id="ion-1"></ion-icon></button></a></span>  
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
<span class="span_p-1"><p>20 Seconds</p></span>
<span class="span_h2-1"><h2>History of Adobe Photoshop<h2></span>
<span class="span_h3-1"><h3>Challenge your understanding of Adobe Photoshop's user interface and workspace. </h3> </span>
<span class="span_btn-1"><a href="../History of Adobe Photoshop/index.php"><button>Start Now<ion-icon name="chevron-forward-outline" id="ion-1"></ion-icon></button></a></span>  
</div>
</div>
</div>
                    <!------------------------>
 <!-- ------------ Different Tools in Adobe Photoshop 1---------------->
     
<!-- <div class="child-adobe">
<div class="adobe-img">
<img src="https://i.imgur.com/63Cbgc4.png" alt="Adobepic">
<div class="adobe-text">
<span class="span_p-1"><p>15 items</p></span>
<span class="span_p-1"><p>20 Seconds</p></span>
<span class="span_h2-1"><h2>Different Tools in Adobe Photoshop Part 1</h2></span>
<span class="span_h3-1"><h3>Challenge your understanding of Adobe Photoshop's user interface and workspace. </h3> </span>
<span class="span_btn-1"><a href="../Different Tools in Adobe Photoshop/index.php"><button>Start Now<ion-icon name="chevron-forward-outline" id="ion-1"></ion-icon></button></span> </div>
</div>
</div> -->
                    <!------------------------>
 
                    
                    
 
  </body>
</html>
