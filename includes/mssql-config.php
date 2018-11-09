<?php
/**
 * These are the database login details
 */
$selected='';

if(isset($_POST['serverse'])){
    $selected= $_POST['serverse'];
    switch ($selected) {
        case "1":
            $_SESSION['MSHOST'] = '.\sqlexpress,1433'; 		
            $_SESSION['MSUSER'] = 'sa'; 	
            $_SESSION['MSPASSWORD'] = 'A12b34c99d'; 	
            $_SESSION['MSDATABASE'] = 'CNLPOS'; 	
            $_SESSION['STOREC'] = 'D6A8784E-14EE-4C29-9CD3-443AF77BBFDB'; 
            break;
        case "2":
            $_SESSION['MSHOST'] = '192.168.1.17\sqlexpress,1433';
            $_SESSION['MSUSER'] = 'sa';
            $_SESSION['MSPASSWORD'] = 'A12b34c99d';
            $_SESSION['MSDATABASE'] = 'CNLPOS';
            $_SESSION['STOREC'] = 'D6A8784E-14EE-4C29-9CD3-443AF77BBFDB'; 
            break;
        case "3":
            $_SESSION['MSHOST'] = '.\sqlexpress,1433';
            $_SESSION['MSUSER'] = 'sa';
            $_SESSION['MSPASSWORD'] = 'A12b34c99d';
            $_SESSION['MSDATABASE'] = 'CNLPOS';
            $_SESSION['STOREC'] = 'D6A8784E-14EE-4C29-9CD3-443AF77BBFDB'; 
            break;
}
}
