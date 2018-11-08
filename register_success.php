<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
if (login_check($mysqli) == false) {
    header('Location: ./index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Registration Successful</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/style.css">
<script type="text/JavaScript" src="js/style.js"></script>
</head>

<body>
<div class="topnav" id="topnav">
 <a href="#">Sales</a>
 <a href="inventory.php">Inventory</a>
 <a href="#">Report</a>
  <div class="dropdown active">
   <button class="dropbtn">Admin</button>
   <div class="dropdown-content">
    <a href="adduser.php" class="active">Create New User</a>
    <a href="updateuser.php">Change Password</a>
   </div>
  </div>
   <div class="topnav-right">
    <a style="font-weight:bold;" href="includes/logout.php">Logout</a>
   </div>
</div>

<div class="content grid-container">
<div class="grid-item">
 <h1>Registration Successful</h1>
 
 
<a href="adduser.php" class="button">Click here to add more user</a>
</div></div>

<div class="footer">
 <p>Copyright © 2018 by Brianware Inc</p>
</div>
</body>
</html>