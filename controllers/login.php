<?php
	include 'db_connect.php';

	session_start();

	$username = $_POST['username'];
	$password = $_POST['password'];
	$firstName = '';
	$lastName = '';
	$usersQuery = mysqli_query($link, "SELECT * FROM tr10_users");

	$valid = false;

	while ($user = mysqli_fetch_array($usersQuery)) {
		if ($username == $user['username']) {
			$valid = true;
			$userID = $user['userID'];
		}
	}
	if (!$valid) {
		$_SESSION['user'] = "Logan";
		//header("Location: ../index.php?n");
	} else {
		echo "<script>
				window.location.href = 'main.html?userID=".$userID."';
			</script>";
	}

?>
