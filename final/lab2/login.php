<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		$username = $_POST["username"];
		$password = $_POST["password"];

		if ($username === "admin" && $password === "123") {
			// login successful, store user's information in session
			$_SESSION["username"] = $username;
			$_SESSION["role"] = 'admin';
			$_SESSION["last_login"] = time();

			header('Location: home.php');
			// echo "username or password is valid";
		} elseif ($username === 'regular' && $password === '123' )  {

			// login successful, store user's information in session
			$_SESSION["username"] = $username;
			$_SESSION["role"] = 'user';
			$_SESSION["last_login"] = time();

			header('Location: home.php');
		} else {
			// login unsuccessful, session remains emtpy
			echo "username or password is invalid";
		}
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
	<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
		<input type="text" placeholder="username" name="username">
		<input type="password" placeholder="password" name="password">
		<input type="submit">
	</form>	
</body>
</html>