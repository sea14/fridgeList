<?php

	<!--your standard connect to the database external file-->
	$h = 'server';
	$u = 'username';
	$p = 'password';
	

	$dbname = 'webdb';
	
	$db = mysql_connect($h, $u, $p)
		or die('Could not make the connection');

	mysql_select_db($dbname)
		or die('Could not select db');
?>
