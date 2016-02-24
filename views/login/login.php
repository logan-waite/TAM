<?php
	include 'db_connect.php';

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
		echo "Invalid username and/or password.</br>
			If you haven't made a user yet, please <a href='new_user.html'>click here</a>. <br>
			Otherwise, <a href='index.html'>click here</a> to go back to the main page.";
	} else {
		echo "<script>
				window.location.href = 'main.html?userID=".$userID."';
			</script>";
	}
	
?>