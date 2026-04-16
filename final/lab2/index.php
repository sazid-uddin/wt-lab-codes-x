<?php
	setcookie("theme", "light", time() + (7*24*60*60));
	if(isset($_COOKIE["theme"])) {
		echo "User has chosen a theme: " . $_COOKIE["theme"];
	} else {
		echo "User has not chosen a theme";
	}
	setcookie("theme", "dark", time() + (30*24*60*60));
	setcookie("theme", "", time() - 30);
?>	