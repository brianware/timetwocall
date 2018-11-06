<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
if (login_check($mysqli) == true) {
    $logged = 'in';
    header('Location: ./home.php');
} else {
    $logged = 'out';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Index</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/JavaScript" src="js/sha512.js"></script> 
<script type="text/JavaScript" src="js/forms.js"></script> 

<style>
body {font-family: Arial, Helvetica, sans-serif;}
 /* Bordered form */
form {
    border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
.button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
  }

/* Add a hover effect for buttons */
.button:hover {
    opacity: 0.8;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 30%; 
}

/* Add padding to containers */
.container {
    padding: 16px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    border: 1px solid #888;
 }

.contain {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%);
    display: flex;
    flex-direction: column;
    width: 350px;
}
</style>
</head>
<body>

<div class="contain">

<form class="modal-content" action="includes/process_login.php" method="post" name="login_form">
 <h4 style="padding-left:16px;">B-Suite 2018</h4>
 <div class="imgcontainer">
  <img src="img/pos.png" class="avatar">
 </div>
    
 <div class="container">
  <label for='username'><b>Username</b></label>
   <input type="text" placeholder="Enter Username" name='username' required>
  <label for='password'><b>Password</b></label>
   <input id="myInput" type='password' placeholder="Enter Password" name='password' id='password' required>
<?php
        if (isset($_GET['error'])) {
            echo "<script type='text/javascript'>alert('Error Logging In! Check your username / password!')</script>";
        }
?> 
 </div>

 <div class="container" style="background-color:#f1f1f1">
  <input id="myBtn" type='button' class="button" name='Submit' value='Login' onclick="formhash(this.form, this.form.password);"/>
  <p style="text-align:right;font-size:10px;">Copyright © 2018 by Brianware Inc</p>
 </div>
</form>
</div>
<script type="text/JavaScript" src="js/entkey.js"></script> 
</body>
</html>