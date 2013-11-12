<?php

	session_start();
	$old_user = $_SESSION['valid_user'};
	$_SESSION = array();
	if (isset_($_COOKIE[session_name()])) {

		setcookie(session_name(), '', time()-42000, '/');
	}
	session_destroy();
?>
