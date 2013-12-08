<?php


	//require db connection
	require 'connect/dbconnect.php';

	$is_ajax = $_REQUEST['is_ajax'];
	if(isset($is_ajax) && $is_ajax) {

		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];

		//create query to check for existence of user input in the db

	}else{


		echo "Invalid user login information.";

	}

?>


