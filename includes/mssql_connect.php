<?php
include_once 'mssql-config.php';   // Needed because functions.php is not included
sec_session_start();
$connectionInfo = array( "Database"=>$_SESSION['MSDATABASE'], "UID"=>$_SESSION['MSUSER'], "PWD"=>$_SESSION['MSPASSWORD']);
$conn = sqlsrv_connect( $_SESSION['MSHOST'], $connectionInfo);

if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}
?>