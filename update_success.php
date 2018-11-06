<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Update Successful</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/style.css">
<script type="text/JavaScript" src="js/style.js"></script>
</head>

<body>
<div class="topnav" id="topnav"><a></a>
   <div class="topnav-right">
    <a style="font-weight:bold;" href="includes/logout.php">Logout</a>
   </div>
</div>

<div class="content grid-container">
 <h1>Update Password Successful</h1>
<p> You will be automatically <a href="includes/logout.php">logout </a> in <span id="countdowntimer">10 </span> seconds.</p>
</div>




<div class="footer">
 <p>Copyright © 2018 by Brianware Inc</p>
</div>
<script type="text/JavaScript" src="js/10timer.js"></script> 
</body>
</html>