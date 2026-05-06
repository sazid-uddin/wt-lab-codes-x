<?php
	include_once("../../db/db_conn.php");
	include_once("../../model/UserModel.php");

	echo "included <br>";
	session_start();
	echo "session start <br>";

	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		echo "post method <br>";
		// do validation here
		if (!empty($_POST['username']) && $_POST['username'] !== '') {
			echo "validation pass <br>";
			// validation pass	
			$username = $_POST["username"];
			$password = $_POST["password"];

			// call model
			$userModelObj = new UserModel();
			echo "model obj created <br>";
			$loginSuccess = $userModelObj->checkLogin($username, $password);
			echo "login success: " . ($loginSuccess ? "true" : "false") . "<br>";

			if ($loginSuccess === TRUE) {
				// collect all data required for home page and store in session
				$usersList = $userModelObj->getUsersList();
				$_SESSION['usersList'] = $usersList;

				header('Location: ../../view/home.view.php');
			} else {
				header('Location: ../../view/login.view.php');
			}
		} else {
			// validation fail
			echo "validation fail <br>";
			header('Location: ../../view/login.view.php');
		}
	}
?>