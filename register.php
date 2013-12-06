<!DOCTYPE html>
<head>
	<title>Register</title>
</head>
<body>

<?php

	//connect to db
	require 'connect/dbconnect.php';

	//get user input, html form below
?>

<div id="pagewrap">
  <div id="header">
  <img src="images/fridgeList_logo.png" alt="Fridge List Logo"></img>
  </div>

<div class="clear"></div>
   
  <div id="register">
        <a href="sign_in.html">Sign In</a>/<a href="register.html">Register</a>
        </div>
        
  <div id="navigation"> 
                <a href="#" id="mylist">My List</a>
                <a href="#" id="recipes">Recipes</a>
                <a href="#" id="invitations">Invitations</a>
  </div>

  <div id="main">
	<p>
	<form method = "POST" action = "register.php">
	First Name:<input type="text" name="firstName"><br>
	Last Name:<input type="text" name="lastName"><br>
	Email:<input type="text" name="email"><br>
	Confirm Email:<input type="text" name="confirm"><br>
	Password:<input type = "text" name="password"><br>
	Coupons?<input type = "checkbox" value = "Yes"><br>
	</form>
	</p>
   </div>

<?php

	//now that we've got user input, create a record for them in the db
	

	if(get_magic_quotes_gpc()){
		
		//security checks on user input
		$firstName = htmlentities(strip_tags($_POST['firstName']));
		$lastName = htmlentities(strip_tags($_POST['lastName']));
		$email = htmlentities(strip_tags($_POST['email']));
		$password = sha1(htmlentities(strip_tags($_POST['password'])));
		$coupons = htmlentities(strip_tags($_POST['coupons']));
	
	}else{ //magic_quotes_gpc is off, use addslashes

		$firstName = addslashes(htmlentities(strip_tags($_POST['firstName'])));
		$lastName = addslashes(htmlentities(strip_tags($_POST['lastName'])));
		$email = addslashes(htmlentities(strip_tags($_POST['email'])));
		$password = sha1(addslashes(htmlentities(strip_tags($_POST['password']))));
		$coupons = addslashes(htmlentities(strip_tags($_POST['coupons'])));

	}

	//now we write our query for registering a user
	$query = 'insert into users (firstName, lastName, email, coupons, password) values'.
		'($firstName, $lastName, $email, $coupons, $password)';

	$num_rows = mysql_num_rows($result);
	if($num_rows>0){
		echo "it worked!";

	}

	//close statement and connection
	mysql_close($db);	

?>

</html>
