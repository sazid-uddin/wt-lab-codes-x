<?php
include('db_conn.php');
$username = 'john';

$sql = "SELECT * FROM USERS WHERE username = '" . $username . "';";
$result = $conn->query($sql);
echo $sql;

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$email = $row['email'];
		$profile_pic_data = base64_encode($row['profile_pic_blob']);
		$profile_pic_type = $row["profile_pic_type"];
		echo $profile_pic_data;
		echo "<br>";
		echo $profile_pic_type;
		echo "<br>";
		echo $email;
		echo "<br>";
	}
	echo "done";
} else {
	echo "no rows";
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
	<h1>Hello <?php echo $username ?></h1>
	<h2>Your email is <?php echo $email ?></h2>
	<img src="data:<?php echo $profile_pic_type?>;base64,<?php echo $profile_pic_data?>">
</body>
</html>