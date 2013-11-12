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

		//query database
		$query = 'select usertype from table ' . "where username = '$login_user' " . "and password = sha1('$login_pass')";

		$result = mysql_query($query);

		$num_row = mysql_num_rows($result);

		if($num_rows>0){

			session_start(); //begin the session
			$row = mysql_fetch_row($result);
			$_SESSION['valid_user'] = $login_user;
			$_SESSION['usertype'] = $row[0];
	}
	mysql_close($db);
?>
