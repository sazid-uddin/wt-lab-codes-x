<?php
session_start();

// check if session exists
include_once("db_conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		// create user in db
		// $sql = "INSERT into users (email, username, password) values ('". $_POST['email'] ."', '" . $_POST['username'] . "', '" . $_POST['password'] ."');";
		$sql = "INSERT into users (email, username, password) values (?,?,?);";
		$statement = $conn->prepare($sql);
		$statement->bind_param("sss", $email, $username, $password);
		$insert_success = $statement->execute();

		if ($insert_success === TRUE) {
			header('Location: home.php'); // with success message
		} else {
			// header('Location: home.php'); // with error message
			echo "Insert failed. Error: " . $conn->error;
		}
	}
}
