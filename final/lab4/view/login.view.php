<?php
session_start();
if (isset($_SESSION['username'])) {
	// user is already logged in
	header('Location: home.view.php');
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>Page Title</title>
	<link rel='stylesheet' href='main.css'>
</head>
<body>
	<form method="post" action="../controller/user/loginHandler.php">
		<input type="text" placeholder="username" name="username">
		<input type="password" placeholder="password" name="password">
		<input type="submit">
		<?php 
			if (isset($_SESSION['error']['login'])) {
				echo $_SESSION['error']['login'];
			}
		?>
	</form>	
</body>
</html>