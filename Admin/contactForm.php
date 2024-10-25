<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Contact Us</title>
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
#btn_read {
    background-color: green;
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
.btn_read:hover{
  background-color: #17e60b;
    color: black;
}
.btn-unread:hover{
  background-color: #ff0000;
  color: black
}
.btn-unread {
  text-decoration: none;
    border: none;
    background-color: red;
    color: white;
    padding-left: 23px;
    padding-top: 6px;
    padding-bottom: 6px;
    padding-right: 10px;
    border-radius: 13px;
    transition: all 0.5s;
    font-weight: bold;
    cursor: pointer;
    text-align: center;
}
.btn-col {

}
/*  */
</style>
</head>
<body>
<!-- Your header section -->
<div class="header">
  <!-- NAVIGATION BAR -->
  <div class="topnav">
    <a href="../admin/logout.php">Logout</a>
    <!-- Add more navigation links if needed -->
  </div>
  <!-- LOGO -->
  <div class="logo">
    <a href="home-page.html"><img src="https://i.imgur.com/mVR6QsO.png" alt="Expired" /></a>
    <h3 style="font-weight: lighter;">Contact Us</h3>
  </div>
</div>

<!-- TOGGLE ICON  -->
<input type="checkbox" class="togggle-sidebar" id="togggle-sidebar" />
<label for="togggle-sidebar" class="toggle-icon">
  <div class="bar-top"></div>
  <div class="bar-center"></div>
  <div class="bar-bottom"></div>
</label>

<!-- Your sidebar section -->
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
    </div>
  </ul>
</div>

<!-- User Management Table -->
<table class="content-table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Email</th>
      <th>Message</th>
      <th>Created At</th>
      <th>Status</th>
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

    $sql = "SELECT * FROM contact_us";
    $result = $conn->query($sql);

    if (!$result) {
        die("Invalid query: " . $conn->error);
    }
    while ($row = $result->fetch_assoc()) {
      // Determine the status color based on the status value
      $statusColor = $row['status'] == 'Read' ? 'green' : 'red';
      echo "
      <tr class='active-row'>
        <td>{$row['id']}</td>
        <td>{$row['firstname']}</td>
        <td>{$row['lastname']}</td>
        <td>{$row['email']}</td>
        <td>{$row['message']}</td>
        <td>{$row['created_at']}</td>
        <td style='color: $statusColor;'>{$row['status']}</td>
        <td>
          <div class='btn-col'>
            <button type='button' class='btn-read' id='btn_read'>Read</button>
            <button type='button' class='btn-unread' id='btn-unread'onclick='markUnread({$row['id']})'>Unread</button>
          </div>
        </td>
      </tr>
      ";
  }
  
  ?>
  </tbody>
</table>

<!-- Your JavaScript code here -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const readButtons = document.querySelectorAll(".btn-read");
    const unreadButtons = document.querySelectorAll(".btn-unread");

    readButtons.forEach(button => {
        button.addEventListener("click", function () {
            const row = this.closest("tr");
            const id = row.querySelector("td:first-child").textContent;

            fetch(`update_status.php?id=${id}&status=Read`, {
                method: "POST"
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    row.querySelector("td:nth-child(7)").textContent = "Read"; // Update the status text
                    row.querySelector("td:nth-child(7)").style.color = "green"; // Update the status color
                    alert("Message marked as read!");
                } else {
                    alert("Error marking message as read: " + data.error);
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });

    unreadButtons.forEach(button => {
        button.addEventListener("click", function () {
            const row = this.closest("tr");
            const id = row.querySelector("td:first-child").textContent;

            fetch(`update_status.php?id=${id}&status=Unread`, {
                method: "POST"
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    row.querySelector("td:nth-child(7)").textContent = "Unread"; // Update the status text
                    row.querySelector("td:nth-child(7)").style.color = "red"; // Update the status color
                    alert("Message marked as unread!");
                } else {
                    alert("Error marking message as unread: " + data.error);
                }
            })
            .catch(error => console.error("Error:", error));
        });
    });
});
</script>

</body>
</html>
