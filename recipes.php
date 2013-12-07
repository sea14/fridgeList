<!DOCTYPE html>
<meta charset=UTF-8>
    <title>Fridge List</title>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
  </head>
  
  <body>

<?php

//recipes.php holds a user's created recipes. if a user isn't logged in, it asks them to do so -->

	class recipe
	{
		public $recipe_id = '' //recipe id, pk
		public $name = ''; //recipe name
		public $url = ''; //recipe url
	}

	//functions will go below here, not sure what they'll be yet



	if(isset($_SESSION['valid_user'])) {
		//user has logged in
	echo 'Welcome, ' . $_SESSION['valid_user'] . '<br>' . 'Your recipes are listed below.';
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
<a href="lists.php" id="list">My List</a>
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

