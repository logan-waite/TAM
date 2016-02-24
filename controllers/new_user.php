<?php
	include 'db_connect.php';

	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	$success = mysqli_query($link, "INSERT INTO tr10_users (firstName, lastName, username, password)
							VALUES ('$firstName', '$lastName', '$username', '$password')");
	if ($success) {
		echo "Added to the database!";
	} else {
		echo "Unsuccessful.";
	}
?>
<script type="text/javascript">
	setTimeout(function() {
		window.location.href = "index.html";
	}, 2000);
</script>