<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
if (login_check($mysqli) == false) {
    header('Location: ./index.php');
}


/**
 * These are the database login details
 */
$selected='';
$_SESSION['MSHOST'] = '.\sqlexpress,1433';
$_SESSION['MSUSER'] = 'sa';
$_SESSION['MSPASSWORD'] = 'A12b34c99d';
$_SESSION['MSDATABASE'] = 'CNLPOS';
$_SESSION['STOREC'] = 'D6A8784E-14EE-4C29-9CD3-443AF77BBFDB';
$_SESSION['STOREN'] = 'C1';
if(isset($_POST['serverse'])){
    $selected= $_POST['serverse'];
    switch ($selected) {
        case "1":
            $_SESSION['MSHOST'] = '.\sqlexpress,1433';
            $_SESSION['MSUSER'] = 'sa';
            $_SESSION['MSPASSWORD'] = 'A12b34c99d';
            $_SESSION['MSDATABASE'] = 'CNLPOS';
            $_SESSION['STOREC'] = 'D6A8784E-14EE-4C29-9CD3-443AF77BBFDB';
            $_SESSION['STOREN'] = 'C1';
            break;
        case "2":
            $_SESSION['MSHOST'] = '192.168.1.17\sqlexpress,1433';
            $_SESSION['MSUSER'] = 'sa';
            $_SESSION['MSPASSWORD'] = 'A12b34c99d';
            $_SESSION['MSDATABASE'] = 'CNLPOS';
            $_SESSION['STOREC'] = 'D6A8784E-14EE-4C29-9CD3-443AF77BBFDB';
            $_SESSION['STOREN'] = 'C2';
            break;
        case "3":
            $_SESSION['MSHOST'] = '.\sqlexpress,1433';
            $_SESSION['MSUSER'] = 'sa';
            $_SESSION['MSPASSWORD'] = 'A12b34c99d';
            $_SESSION['MSDATABASE'] = 'CNLPOS';
            $_SESSION['STOREC'] = 'D6A8784E-14EE-4C29-9CD3-443AF77BBFDB';
            $_SESSION['STOREN'] = 'SP';
            break;
    }
}

define("MSHOST", $_SESSION['MSHOST']); 			// The host you want to connect to.
define("MSUSER", $_SESSION['MSUSER']); 			// The database username.
define("MSPASSWORD", $_SESSION['MSPASSWORD']); 	// The database password.
define("MSDATABASE", $_SESSION['MSDATABASE']); 
define("STOREC", $_SESSION['STOREC']);
define("STOREN", $_SESSION['STOREN']);
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
     <div class="login-container">
     <form <?php echo htmlentities($_SERVER['PHP_SELF']); ?> method="post" name="serverselect">
     <select name="serverse" onchange="this.form.submit()">
     <option selected="selected" disabled="disabled">Select Server</option>
  <option value="1">C1</option>
  <option value="2">C2</option>
  <option value="3">SP</option>
  
</select>
</form>
</div>
</div>

<div class="content grid-container" style="max-width:600px;">

<div class="grid-item"><form id="jsform" method="post">
 <p>Inventory List - Enter barcode to check stock balance</p>
 <p>You are currently connected to database of store <?php echo STOREN;?></p>
 
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