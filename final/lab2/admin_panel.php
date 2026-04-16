<?php
	session_start();

	if (isset($_SESSION["username"]) && isset($_SESSION["role"]) && isset($_SESSION["last_login"])) {
		// user is logged in
		if ($_SESSION['role'] === 'admin' || $_SESSION["role"] === 'moderator') {
			echo "Welcome to your admin panel, " . $_SESSION["username"];
		} else {
			header('Location: home.php');
		}
	} else {
		// user is not logged in
		header('Location: login.php');
	}
?>