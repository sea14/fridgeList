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
		$coupons = htmlentities(strip_tags($_POST['coupons']));
	
	}else{ //magic_quotes_gpc is off, use addslashes

		$firstName = addslashes(htmlentities(strip_tags($_POST['firstName']));
		$lastName = addslashes(htmlentities(strip_tags($_POST['lastName'])));
		$email = addslashes(htmlentities(strip_tags($_POST['email'])));
		$coupons = addslashes(htmlentities(strip_tags($_POST['coupons'])));

	}

	//now we write our query
	
	printf("%d Row insterted.\n", $stmt->affected_rows);

	//close statement and connection
	

?>

</html>
