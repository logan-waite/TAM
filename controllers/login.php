<?php
	include '../resources/db_connect.php';
/*
	session_start();
	$_SESSION['user'] = "Logan";
*/

	$username = $_POST['username'];
	$password = $_POST['password'];
	$invalid = true;

	$user_query_string = "
		SELECT username, password
		FROM users
	";

	$user_query = $link->query($user_query_string);

	$user = $user_query->fetch();

	if (!$user)
	{
		$invalid = true;
	}
	else
	{
		if ($user['password'] != $password)
		{
			$invalid = true;
		}
		else
		{
			$invalid = false;
		}
	}


	if ($invalid) {
		header("Location: ../index.php?n");
	} else {
		echo "Logged in!";
	}

?>
