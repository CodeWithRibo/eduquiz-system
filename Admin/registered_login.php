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
    <title>Registered Login</title>
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
    border-bottom: 1.5px solid #62a0d8;
}

.content-table tbody tr.active-row {
    
    color: black;
}
.active-row input{
  padding: 12px;
    width: 190px;
    border: 1.5px solid #03baff;
    border-radius: 4px;
    transition: all 0.5s;
}
.active-row input:hover{
  border-color: rgb(14, 132, 211);
  outline-color: #00a2ff;
 border: 1.5px solid rgb(35, 168, 221);
}
.active-row input:focus{
  outline: auto;
  outline-color: rgb(43, 147, 216);
 border: 1.5px solid rgb(19, 125, 211);
}

/* ACTION BUTTON */
#btn_edit {
    background-color: #0b5ed7;
    border: none;
    color: white;
    padding-left: 23px;
    padding-top: 6px;
    padding-bottom: 6px;
    padding-right: 23px;
    border-radius: 13px;
    transition: all 0.5s;
    font-weight: bold;
    cursor: pointer;
}
.btn_edit:hover{
  background-color: #0c79f2;
    color: black;
}
.btn-delete:hover{
  background-color: #d33737;
  color: black
}
.btn-delete {
  text-decoration: none;
  border: none;
    background-color: red;
    color: white;
    padding-left: 23px;
    padding-top: 6px;
    padding-bottom: 6px;
    padding-right: 23px;
    border-radius: 13px;
    transition: all 0.5s;
    font-weight: bold;
    cursor: pointer;
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
        <h3 style="font-weight: lighter;">Registered user</h3>
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
          <a href="../questions upload handler/Question Upload Page.php"><ion-icon name="cloud-upload-outline"></ion-icon>Upload Question</a>
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
    <!-- user management -->
     <!-- table row -->
 <table class="content-table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Email</th>
      <th>Password</th>
      <th>Points</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
     $servername = "localhost";
     $username = "root"; 
     $password = ""; 
    $database = "eqs_users"; 

     
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
 $sql = "SELECT * FROM users";
 $result = $conn->query($sql);
 
 if (!$result) {
     die("Invalid query: " . $conn->error);
 }
// read data of each row
while ($row = $result->fetch_assoc()) {
  echo "
  <tr class='active-row'>
      <td>$row[id]</td>
      <td><input type='text' name='firstname[]' value='$row[firstname]'></td>
      <td><input type='text' name='lastname[]' value='$row[lastname]'></td>
      <td><input type='email' name='email[]' value='$row[email]'></td>
      <td><input type='text' name='password[]' value='$row[password]'></td>
      <td><input type='text' name='points[]' value='{$row['points']}'></td>
      <td>
          <div class='btn-col'>
              <button type='button' class='btn-edit' id='btn_edit'>Update</button>
              <button type='button' class='btn-delete' onclick='deleteUser($row[id])'>Delete</button>
          </div>
      </td>
  </tr>
  ";
}
    ?> 
  </tbody>
</table>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const editButtons = document.querySelectorAll(".btn-edit");

        editButtons.forEach(button => {
            button.addEventListener("click", function () {
                const row = this.closest("tr");
                const id = row.querySelector("td:first-child").textContent;
                const formData = new FormData();
                const inputs = row.querySelectorAll("input[type='text'], input[type='email']");

                inputs.forEach(input => {
                    formData.append(input.name, input.value);
                });

                fetch(`update.php?id=${id}`, {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Update successful!");
                        // Optionally update the row in the table visually
                    } else {
                        alert("Update failed!");
                    }
                })
                .catch(error => console.error("Error:", error));
            });
        });
    });
    function deleteUser(id) {
        if (confirm("Are you sure you want to delete this user?")) {
            fetch(`delete.php?id=${id}`, {
                method: "GET"
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("User deleted successfully!");
                    // Optionally remove the row from the table visually
                } else {
                    alert("Error deleting user: " + data.error);
                }
            })
            .catch(error => console.error("Error:", error));
        }
    }


</script>

  </body>
</html>
