<?php
include_once 'db_connect.php';
include_once 'psl-config.php';

$error_msg = "";

if (isset($_POST['username'], $_POST['p'])) {
    // Sanitize and validate the data passed in
       $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // Sanitize and validate the data passed in
       $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }

    if (empty($error_msg)) {
        // Create a random salt
        $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));

        // Create salted password 
        $password = hash('sha512', $password . $random_salt);
        
        // Insert the new user into the database 
        if ($update_stmt = $mysqli->prepare("UPDATE members SET password = ?, salt = ? WHERE username = ?")) {
            $update_stmt->bind_param('sss', $password, $random_salt , $username);
            // Execute the prepared query.
            if (! $update_stmt->execute()) {
                header('Location: ../error.php?err=Change Password failure: UPDATE');
                exit();
            }
        }
        header('Location: ./update_success.php');
        exit();
    }
}