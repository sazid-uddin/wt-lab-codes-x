<?php
	// $note = [
	// 	"to"=>"Tove",
	// 	"from"=>"Jani",
	// 	"heading"=>"Reminder",
	// 	"body"=>[
	// 		"content"=>"Don't forget me this weekend!",
	// 		"footer"=>"Bye"
	// 	]
	// ];

	$note = simplexml_load_file("note.xml") or die("Unable to read XML file");
	print_r($note);
	echo "<br>";
	echo $note->body->footer;
?>