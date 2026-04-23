<?php
	session_start();

	// check if session exists
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
	<h1>Create new user</h1>
	<form method="post" action="create_user.php">
		<input type="text" placeholder="username" name="username">
		<input type="password" placeholder="password" name="password">
		<input type="email" placeholder="email" name="email">
		<input type="submit" value="Create">
	</form>	
</body>
</html>