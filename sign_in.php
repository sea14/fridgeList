<?php

	<!--code for sign in php session goes here. wheee-->
	//initialize our variables, security precautions

	$login_user = "boop";
	$login_pass = "beep";

	//user has given us a username and password, so try to log them in
	if(isset($_POST['login_user']) && isset($_POST['login_pass])){

		//check for magic quotes, sanitize user input
		if(get_magic_quotes_gpc()){

			//magic_quotes is on, so do nothing
			$login_user = htmlentities(strip_tags($_POST['login_user']));
			$login_pass = htmlentities(strip_tags($_POST('login_pass']));
		} else {

			//magic quotes isn't on, so use addslashes
			$login_user = addslashes(htmlentities(strip_tags($_POST['login_user']));
			$login_pass = addslashes(htmlentities(strip_tags($_POST['login_pass']));			
		}
		//connect to our lovely db
		require "dbconnect.php";

		<!--will finish writing rest of login script later-->
	}
?>
