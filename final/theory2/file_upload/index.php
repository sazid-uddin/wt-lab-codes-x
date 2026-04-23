<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title>Page Title</title>
	<link rel='stylesheet' href='main.css'>
</head>
<body>
	<form method="post" action="upload.php" enctype="multipart/form-data">
		Please select a Document to upload:
		<br>
		(Allowed types are: PDFs and DOCXs) | Max file size: 2 kB
		<br>
		<input type="file" name="my_pdf">
		<br>
		<input type="submit" value="Upload">
	</form>	
</body>
</html>