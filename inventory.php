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
<title>Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/style.css">
<script type="text/JavaScript" src="js/style.js"></script>
</head>

<body>
<div class="topnav" id="topnav">
 <a href="#">Sales</a>
 <a href="#" class="active">Inventory</a>
 <a href="#">Report</a>
  <div class="dropdown">
   <button class="dropbtn">Admin</button>
   <div class="dropdown-content">
    <a href="adduser.php">Create New User</a>
    <a href="updateuser.php">Change Password</a>
   </div>
  </div>
  <div class="topnav-right">
   <a style="font-weight:bold;" href="includes/logout.php">Logout</a>
  </div>
</div>

<div class="content grid-container">

<div class="grid-item"><form id="jsform" method="post">
 <p>Inventory List - Enter barcode to check stock balance</p>
   <input autofocus="autofocus" type="text" style="width:70%;" placeholder="Enter Barcode" name='barcode' required>
   <input id="myBtn" style="width:25%;" type='submit' class="button" name='Submit' value='Submit'/>

</form> </div>
 <div class="grid-item">
 
<?php include 'includes/invquery.php' ?> 
 
</div>
 </div>
<div class="footer">
 <p>Copyright © 2018 by Brianware Inc</p>
</div>

<script type="text/JavaScript" src="js/entkey.js"></script> 
</body>
</html>