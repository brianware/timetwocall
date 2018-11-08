<?php
include_once 'mssql-config.php';   // Needed because functions.php is not included

$connectionInfo = array( "Database"=>MSDATABASE, "UID"=>MSUSER, "PWD"=>MSPASSWORD);
$conn = sqlsrv_connect( MSHOST, $connectionInfo);

if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}
?>