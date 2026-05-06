<?php
// API endpoint to get the list of users (GET method)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	include_once("db_conn.php");
	// echo "db conn";
	$users_arr = [];

	$users = $conn->query("SELECT * FROM users;");
	// echo $sql;
	$no_users = $users->num_rows;
	// echo $no_users;
	if ($no_users > 0) {
		$count = 0;
		while ($row = $users->fetch_assoc()) {
			$user = [];
			$user['username'] = $row['username'];
			$user['email'] = $row['email'];
			$user['created_at'] = $row['created_at'];
			$users_arr[$count] = $user;
			$count++;
		}
	}

	echo json_encode($users_arr);
}
?>