<?php
	session_start();

	if (isset($_SESSION["username"]) && isset($_SESSION["role"]) && isset($_SESSION["last_login"])) {
		// user is logged in
		echo "Welcome to your homepage, " . $_SESSION["username"];
	} else {
		// user is not logged in
		header('Location: login.php');
	}
?>

<html>
	<body>
		<form method="post" action="logout.php">
			<input type="submit" value="logout">
		</form>
	</body>
</html>