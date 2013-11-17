<?php

/*if the user clicks to logout
* we will destroy the session
* not sure if this is going to require a fix
* because it wasn't written for mysqli / prepared statements
* most likely. */


	session_start();
	$old_user = $_SESSION['valid_user'};
	$_SESSION = array();
	if (isset_($_COOKIE[session_name()])) {

		setcookie(session_name(), '', time()-42000, '/');
	}
	session_destroy();
?>
