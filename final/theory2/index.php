<?php
	// readfile("webdictionary.txt");
	// Read operation
	// $myFile = fopen("webdictionary.txt", "r") or die("Unable to read file.");
	// $fileSize = filesize("webdictionary.txt");
	// echo fread($myFile, $fileSize);
	// fclose($myFile);

	// Write operation
	// $myFile = fopen("webdictionary.txt", "w") or die("Unable to read file.");
	// $txt= "John Doe\nJane Doe\n";
	// fwrite($myFile, $txt);
	// fclose($myFile);

	// Append operation
	$myFile = fopen("webdictionary.txt", "a") or die("Unable to read file.");
	$txt= "New content";
	fwrite($myFile, $txt);
	fclose($myFile);
?>