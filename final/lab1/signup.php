<?php
	$username = "";
	$email = "";

	$error = [];
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//collect form data
		$username = $_POST["username"];
		$email = $_POST["email"];

		//validation logic
		if (strlen($username) < 3) {
			$error["username"] = "Username is too short <br>";
		}

		//
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
	<form method="post" accept="<?php echo $_SERVER["PHP_SELF"]?>">
		Username: <input type="text" name="username" value="<?php echo $username?>"> <br>
		<?php if (!empty($error["username"])) echo $error["username"]?>
		Email: <input type="text" name="email" value="<?php echo $emai ?>"> <br>
		Password: <input type="password" name="password"> <br>
		<br>
		<input type="submit">
	</form>
</body>
</html>