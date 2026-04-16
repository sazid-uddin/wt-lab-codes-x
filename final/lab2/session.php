<?php
	session_start();

	$_SESSION["role"] = 'admin';

	if(isset($_SESSION["role"]) && $_SESSION["role"] === 'admin') {
		// access to admin pages
		print_r($_SESSION);
		print_r($_COOKIE);
	}
?>