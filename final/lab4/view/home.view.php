<?php
session_start();
if (!isset($_SESSION['username'])) {
	// user is not logged in
	header('Location: login.view.php');
}

$users_arr = $_SESSION['usersList'];
$no_users = count($users_arr);
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
	<style>
		table,td,th {
			border: 2px solid black;
			border-collapse: collapse;
		}
	</style>
		<!-- <a href="new_user.php">Create a new User</a> -->
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
		<!-- <form method="post" action="upload.php" enctype="multipart/form-data">
			<p>Please upload your profile picture:</p>
			<input type="file" name="profile_pic">
			<input type="submit" value="Upload">
		</form>
		<a href="profile.php">View your profile</a> -->
	</body>
</html>