<?php
session_start();
include '../connect.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
!
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reward Received</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body {
        background: #62a0d8;
        font-family: Arial, Helvetica, sans-serif;
      }
      .container {
        position: absolute;
        max-width: 1260px;
        left: 33%;
        top: 21%;
        display: flex;
        flex-direction: column;
        text-align: center;
        justify-content: center;
        box-shadow: -1px 3px 36px 1px rgba(0, 0, 0, 0.59);
        -webkit-box-shadow: -1px 3px 36px 1px rgba(0, 0, 0, 0.59);
        -moz-box-shadow: -1px 3px 36px 1px rgba(0, 0, 0, 0.59);
        width: 700px;
        height: 500px;
        border-radius: 10px;
        background: azure;
        border: 1.5px solid rgb(5, 43, 124);
      }
      .card h1 {
        font-size: 35px;
        font-weight: bold;
        font-style: normal;
        padding: 10px;
      }
      .card_2 p {
        padding: 10px;
        font-size: 20px;
      }
      .btn button {
        padding: 10px;
        border: 1px solid black;
        background: transparent;
        font-size: 15px;
        border-radius: 3.5px;
        width: 200px;
        cursor: pointer;
        transition: all 0.5;
        color: black;
      }
      .btn button:hover {
        transition: all 0.5s;
    background-color: #497ba8;
    color: white;
      }
      .img img {
        width: 200px;
      }
      
    </style>
  </head>
  <body>
    <div class="container">
        <div class="img">
          <img src="https://i.imgur.com/vRdty37.png" alt="ex">
        </div>
      <div class="card">
        <h1>Rewards Not Available Yet</h1>
      </div>
      <div class="card_2">
        <p>Sorry, you have already received a reward in the last 24 hours. Please try again later.</p>
      </div>
      <div class="btn">
     <a href="../index/home-page.php">   <button class="btn_home" >
          Proceed to homepage
        </button></a>
      </div>
    </div>
    <script>
      function Myfunction() {
        window.location = "../login/home-page.php";
      }
    </script>
    <?php
    if (isset($_GET['points'])) {
        $points = $_GET['points'];
        echo "<p>Congratulations! You have received $points points as a reward.</p>";
    } else {
        // echo "<p>Error: Points parameter not found in the URL.</p>";
    }
    ?> 
  </body>
</html>









<!-- <h1>Rewards Not Available Yet</h1>
    <p>Sorry, you have already received a reward in the last 24 hours. Please try again later.</p> -->