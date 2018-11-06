<?php
$servername = "localhost";
$username = "webapp";
$password = "a12b34c99D";
$dbname = "timetwocall";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
    echo "Connection Successful";
}

mysqli_close($conn);
?>