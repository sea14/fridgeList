<?php


	//require db connection
	require 'connect/dbconnect.php';

	$is_ajax = $_REQUEST['is_ajax'];
	if(isset($is_ajax) && $is_ajax) {

		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];

		//create query to check for existence of user input in the db


		if($stmt = $mysqli->prepare("SELECT * FROM users WHERE email=? AND password=?")){
			//bind parameters
			$stmt->bind_param('ss', $email, $password);
			$stmt->execute();
			$stmt->bind_result($email, $password);

			if( TRUE !== $stmt->fetch() ){

				$return = FALSE;

			}

		$stmt->close();

		return $return;

		$mysqli->close();



?>


