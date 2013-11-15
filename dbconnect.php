<?php

	<!--your standard connect to the database external file-->
	$h = 'server';
	$u = 'username';
	$p = 'password';
	
	$dbname = 'webdb';
	
	//instance of the db
	$db = new(mysqli($h,$u,$p);

	//select the db, or if not, die and tell us
	$db->select_db($dbname)
		or die('Could not make the connection');
	
i

?>
