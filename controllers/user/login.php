<?php
	include '../../models/user_model.php';

	session_start();

    // Get user inpuots
	$username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
	$password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    $invalid = true;

    error_log($password);
    
    // If either field is empty, return false
    if (empty($username) || empty($password))
    {
		header("Location: ../../index.php?n");
        exit;
    }
    else
    {
        $invalid = false;
    }

    // attempt to get password from database
    try {
        $user_password = get_user_password($username);
    }
    catch (Exception $e)
    {
        error_log("This happened: ".$e);
        header("Location: ../../index.php?n");
        exit;
    }

    if (empty($user_password))
    {
		header("Location: ../../index.php?n");
        exit;
    }

    $valid = password_verify($password, $user_password);
	
	if (!$valid) {
		header("Location: ../../index.php?n");
	} else {
        $_SESSION['user'] = $username;
        header("Location: ../../views/time_clock.php");
	}
?>
