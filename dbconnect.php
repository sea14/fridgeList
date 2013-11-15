<?php

	<!--your standard connect to the database external file-->
	$h = 'server';
	$u = 'username';
	$p = 'password';
	$dbname = 'webdb';
	
	
	$mysqli = new mysqli($h, $u, $p, $dbname);
	
	if (mysqli_connect_errno () ) {
		echo "connection failed" .
			mysqli_connect_errno();
		exit();
	}
?>	
