<?php
	session_start();

	// check if session exists

	include_once("db_conn.php");

	$users_arr = [];

	$users = $conn->query("SELECT * FROM users;");
	$no_users = $users->num_rows;
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
?>
<html>
	<body>
	<style>
		table,td,th {
			border: 2px solid black;
			border-collapse: collapse;
		}
	</style>
		<a href="new_user.php">Create a new User</a>
		<table>
			<tr>
				<th>Username</th>
				<th>Email</th>
				<th>Created At</th>
				<th>Action</th>
			</tr>
			<?php
				for($i=0; $i<$no_users; $i++) {
					echo "<tr>";
						echo "<td>";
							echo $users_arr[$i]['username'];
						echo "</td>";
						echo "<td>";
							echo $users_arr[$i]['email'];
						echo "</td>";
						echo "<td>";
							echo $users_arr[$i]['created_at'];
						echo "</td>";
						echo "<td>";
							echo "<form method='post' action='delete_user.php'><input type='submit' value='Delete'></form>";
						echo "</td>";
					echo "</tr>";
				}
			?>
		</table>
		<br>
		<br>
		<form method="post" action="upload.php" enctype="multipart/form-data">
			<p>Please upload your profile picture:</p>
			<input type="file" name="profile_pic">
			<input type="submit" value="Upload">
		</form>
		<a href="profile.php">View your profile</a>
	</body>
</html>