<!DOCTYPE html>
<meta charset=UTF-8>
    <title>Fridge List</title>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
  </head>
  <body>
<?php


	<!--code for sign in php session goes here. wheee-->
	session_start();



	//user has given us a username and password, so try to log them in
	if(isset($_POST['login_user']) && isset($_POST['login_pass'])){

		//check for magic quotes, sanitize user input
		if(get_magic_quotes_gpc()){

			//magic_quotes is on, so do nothing
			$login_user = mysqli_real_escape_string($_POST['login_user'])));
			$login_pass = mysqli_real_escape_string(sha1($_POST('login_pass'])));
		} else {

			//magic quotes isn't on, so use addslashes
			$login_user = mysqli_real_escape_string(addslashes($_POST['login_user'])));
			$login_pass = mysqli_real_escape_string((sha1(addslashes(($_POST['login_pass']))));			
		}
		//connect to our lovely db
		require "connect/dbconnect.php";

		//construction of prepared statement
		$sql = 'SELECT email, password FROM  users WHERE email=? AND password=?';
		if($stmt = $mysqli->prepare($sql)) {

			//bind parameters
			$stmt->bind_param('ss' $login_user, $login_pass);
			$stmt->execute();
			$stmt->bind_result($login_pass, $login_user);
			while ($stmt->fetch()) {

					echo "$login_user";
					echo "<br>";
					
			}
		} else{

			echo "prepare failed";
		}
		$stmt->close();
		$mysqli->close();

		

		if($num_rows>0){

			session_start(); //begin the session
			$row = mysql_fetch_row($result);
			$_SESSION['valid_user'] = $login_user;
			
	}
	mysql_close($db);
?>

<div id="pagewrap">
  <div id="header">
  <img src="images/fridgeList_logo.png" alt="Fridge List Logo"/>
  </div>

<div class="clear"></div>
   
  <div id="register">
	<a href="sign_in.html">Sign In</a>/<a href="register.html">Register</a>
	</div>
	
  <div id="navigation"> 
		<a href="#" id="mylist">My List</a>
		<a href="#" id="recipes">Recipes</a>
		<a href="#" id="invitations">Invitations</a>
<?php

	if(isset($_SESSION['valid_user'])) {
		//user has logged in
	echo 'Welcome, ' . $_SESSION['valid_user'] .' You are logged in now! <br>';
	}else{
		if(isset($login_user) && $login_user != "boop"){ //if we're having login problems
		echo "There seems to be a problem with either your password or your username."}else{
		echo "You're not logged in -- would you please do so below?";
	}
}

?>

	</div>
	  	
	<div id="main">
	  <p>
	  <form method - "post" action = "sign_in.php">
	  Username: <input type="text" name="login_user"><br>
  	Password: <input type="text" name="login_pass"><br>
	  <input type="submit" name="Sign in" value="Sign in">
	  </form>
	  </p>
  </div>
   </div>
   </body>
 </html>
