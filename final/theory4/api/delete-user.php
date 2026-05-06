<?php
// API endpoint to delete a user using username (POST method)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	include_once("db_conn.php");
	// echo "db conn";

	$raw = file_get_contents('php://input');
	// echo $raw;
	$data_assoc = json_decode($raw, true);
	// echo($data_assoc);
	$username = $data_assoc['username'] ?? ($_POST['username'] ?? '');
	// echo $username;

	$sql = "DELETE FROM users where username = '" . $username . "';";
	$success = $conn->query($sql);

	if (empty($conn->error)) {
		$response = [
			"success" => true
		];
		echo json_encode($response);
	} else {
		$response = [
			"success"=>"false"
		];
		echo json_encode($response);
	}
}
