<?php
	include '../../resources/db_connect.php';

	session_start();

	$username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
	$password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    
    if (empty($username) || empty($password))
    {
		header("Location: ../../index.php?n");
        exit;
    }
    else
    {
        $invalid = false;
    }

    try {
        $user_query = "
            SELECT username, password
            FROM users
            WHERE username = :username
            ";

        $results = $db->prepare($user_query);
        $results->execute(
            array(
                "username" => $username
            )
        );
    }
    catch (Exception $e)
    {
        error_log("This happened: ".$e);
        header("Location: ../../index.php?n");
        exit;
    }

    if (empty($results->fetch()))
    {
		header("Location: ../../index.php?n");
        exit;
    }
    $user_info = $results->fetch();

		if (password_verify($password, $user_info['password']))
		{
			$invalid = true;
		}
		else
		{
			$invalid = false;
		}


	if ($invalid) {
		header("Location: ../../index.php?n");
	} else {
        $_SESSION['user'] = $username;
        header("Location: ../../views/time_clock.php");
	}

?>
