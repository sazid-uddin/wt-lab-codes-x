<?php
	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		echo "Temp location: ". $_FILES['my_pdf']['tmp_name'];
		echo "<br>";
		echo "Filename: " . $_FILES['my_pdf']['name'];
		echo "<br>";
		echo "File size: " . $_FILES['my_pdf']['size'];
		echo "<br>";
		echo "Mime type: " . $_FILES['my_pdf']['type']; // mime-type
		echo "<br>";
		$target_dir = "uploads/";
		$target_file = $target_dir . $_FILES['my_pdf']['name'];
		
		$target_file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		$target_file_size = $_FILES['my_pdf']['size'];

		$MAX_UPLOAD_SIZE_BYTE = 6*1024;

		// type validation
		if (in_array($target_file_extension, ["pdf", "docx"])) {
			// size validation
			if ($target_file_size < $MAX_UPLOAD_SIZE_BYTE) {
				// store file permanently in server
				if (move_uploaded_file($_FILES['my_pdf']['tmp_name'], $target_file)) {
					echo "File stored in uploads folder successfully";
				} else {
					echo "Could not move file. Error occured";
				}
	 		} else {
				echo "File size limit exceeded. Please upload a smaller file";
			}
		} else {
			echo "Invalid file type";
		}
	}
?>