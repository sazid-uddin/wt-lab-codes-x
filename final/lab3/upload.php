<?php
include("db_conn.php");
$username = 'john'; // get username from session in practical use

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$tmp_file = $_FILES['profile_pic']['tmp_name'];
	$target_file_name = $_FILES['profile_pic']['name'];

	if (is_uploaded_file($tmp_file)) {
		$imgData = file_get_contents($tmp_file);
		$imgType = $_FILES['profile_pic']['type'];

		echo "got image<br>";

		$sql = "UPDATE users SET profile_pic_blob = ?, profile_pic_type = ? WHERE username = ?;";
		echo "Sql written: " . $sql . "<br>";

		$statement = $conn->prepare($sql);
		if ($statement === false) {
			echo "Prepare failed: " . $conn->error . "<br>";
		} else {
			echo "statement prepared<br>";
			if (!$statement->bind_param("sss", $imgData, $imgType, $username)) {
				echo "Bind failed: " . $statement->error . "<br>";
			} else {
				echo "statement bound<br>";
				if ($statement->execute()) {
					echo "Image uploaded successfully<br>";
				} else {
					echo "Image upload failed<br>";
					echo $statement->error . "<br>";
				}
			}
			$statement->close();
		}

		// if ($statement->execute() === TRUE) {
		// 	// upload success
		// 	echo "Image uploaded successfully";
		// } else {
		// 	//upload fail
		// 	echo "Image upload failed";
		// 	echo "<br>";
		// 	echo $conn->error;
		// }
	}
}
