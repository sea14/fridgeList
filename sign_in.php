<!DOCTYPE html>
<meta charset=UTF-8>
    <title>Fridge List</title>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
  </head>
  
  <body>


<?php
	//code for sign in php session goes here. wheee
	session_start();

	//user has given us a username and password, so try to log them in
	if(isset($_POST['login_user']) && isset($_POST['login_pass'])){

		//check for magic quotes, sanitize user input
		if(get_magic_quotes_gpc()){

			//magic_quotes is on, so do nothing
			$login_user = mysqli_real_escape_string($_POST['login_user']);
			$pword = sha1($_POST['login_pass']);
			$login_pass = mysqli_real_escape_string($pword);
		} else {

			//magic quotes isn't on, so use addslashes
			$login_user = mysqli_real_escape_string(addslashes($_POST['login_user']));
			$pword = sha1($_POST['login_pass']);
			$login_pass = mysqli_real_escape_string(addslashes(($_POST['login_pass'])));			
		}
		//connect to our lovely db
		require "connect/dbconnect.php";

		//construction of prepared statement
	
		if($stmt = $mysqli->prepare("SELECT * FROM users WHERE email=? AND password=?")){
			//bind parameters
			$stmt->bind_param('ss', $login_user, $login_pass);
			$stmt->execute();
			$stmt->bind_result($login_pass, $login_user);
			while ($stmt->fetch()) {

					echo "Welcome, " . $login_user . "You are signed in now.";
					echo "<br>";
			}

		}
	
		$stmt->close();
		$mysqli->close();

		

		if($num_rows>0){

			session_start(); //begin the session
			$_SESSION['valid_user'] = $login_user;
			
	}
	mysql_close($db);

}
	if(isset($_SESSION['valid_user'])) {
		//user has logged in
	echo 'Welcome, ' . $_SESSION['valid_user'] .' You are logged in now! <br>';
	}else{
		if(isset($login_user) && $login_user != "boop"){ //if we're having login problems
		echo "There seems to be a problem with either your password or your username.";
		}else{
		echo "You're not logged in -- would you please do so below?";
	}
}

?>
 <div id="logo">
  <a href="a2.html"><img src="fridgeList_logo.png" alt="Fridge List Logo"></a>
 <p>&nbsp; &nbsp; an application designed for the busy and hungry! 
  </div> 
  
  <div id="register">
	<h3><a href="sign_in.php">Sign In</a>/<a href="register.php">Register</a></h3>
	</div>
	
<div id="pagewrap">
<div class="clear"></div>
<div id="navigation">
<a href="a2.html" id="home">Home</a>
<a href="index.html" id="about">About</a>
<a href="list.php" id="list">My List</a>
<a href="recipes.php" id="recipes">Recipes</a>

</div>	

	<div id="main">
	<p><a href="register.php">Register</a> or <a href="sign_in.php">sign in</a> to start creating your grocery lists!<br /></p><br />
	<form method = "post" action = "sign_in.php">
        Email: <input type="text" name="login_user"><br>
        Password: <input type="password" name="login_pass"><br>
  <input type="submit" value="submit">
   </div>
  </div>
   </body>
 </html>


