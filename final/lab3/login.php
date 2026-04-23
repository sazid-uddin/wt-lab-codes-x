<?php
	include_once("db_conn.php");
	session_start();
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		$username = $_POST["username"];
		$password = $_POST["password"];

		// check username and password in DB
		$result = $conn->query("SELECT * FROM users where username='" . $username . "';");

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				if($row['password'] === $password) {
					$_SESSION["username"] = $username;
					$_SESSION["last_login"] = time();

					header('Location: home.php');
				} else {
					echo "Password is invalid";
				}
			}
		} else {
			echo "Username is invalid";
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