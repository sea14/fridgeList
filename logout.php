<?php

/*if the user clicks to logout
* we will destroy the session
 */


	session_start();
	$old_user = $_SESSION['valid_user'};
	$_SESSION = array();
	if (isset_($_COOKIE[session_name()])) {

		setcookie(session_name(), '', time()-42000, '/');
		unset($_COOKIE[session_name()]);
	}
	session_destroy();
?>
