<?php
include_once 'includes/updateuser.inc.php';;
include_once 'includes/functions.php';
sec_session_start();
if (login_check($mysqli) == false) {
    header('Location: ./index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Update Password</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/style.css">
<script type="text/JavaScript" src="js/sha512.js"></script> 
<script type="text/JavaScript" src="js/updateuser.js"></script>
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
    <a href="adduser.php">Create New User</a>
    <a href="updateuser.php" class="active">Change Password</a>
   </div>
  </div>
   <div class="topnav-right">
    <a style="font-weight:bold;" href="includes/logout.php">Logout</a>
   </div>
</div>

<div class="content grid-container">
<div class="grid-item">
 <h1>Change your password</h1>
 <?php
  if (!empty($error_msg)) {
   echo $error_msg;
  }
 ?>
 <ul>
  <li>Passwords must contain
   <ul>
    <li>At least one upper case letter (A..Z)</li>
    <li>At least one lower case letter (a..z)</li>
    <li>At least one number (0..9)</li>
   </ul>
  </li>
  <li>Your password and confirmation must match exactly</li>
 </ul></div>
 <div class="grid-item">
  <form method="post" name="updateuser_form" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>">
  <input type='hidden' name='username' id='username' value='<?php echo htmlentities($_SESSION['username']);;?>'/> 
                     Password: <input type="password" autofocus="autofocus"
                             name="password" 
                             id="password"/><br>
            Confirm password: <input type="password" 
                                     name="confirmpwd" 
                                     id="confirmpwd" /><br>
            <input type="button" class="button"
                   value="Change Password" 
                   onclick="return regformhash(this.form,
                                   this.form.password,
                                   this.form.confirmpwd);" /> 
  </form>
</div>
</div>
<div class="footer">
 <p>Copyright © 2018 by Brianware Inc</p>
</div>
</body>
</html>