<?php
session_start();
?>

<!DOCTYPE html>
<meta charset=UTF-8>
    <title>Fridge List</title>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
  </head>

<?php
	$old_user = $_SESSION['user_id'];
	
		$_SESSION = array();
		if (isset($_COOKIE[session_name()])) {

			setcookie(session_name(), '', time()-42000, '/');
			unset($_COOKIE[session_name()]);
	}
	session_destroy();
?>

  <body>

?>
 <div id="logo">
  <a href="a2.php"><img src="fridgeList_logo.png" alt="Fridge List Logo"></a>
 <p>&nbsp; &nbsp; an application designed for the busy and hungry! 
  </div> 
  
  <div id="register">
	<h3><a href="sign_in.php">Sign In</a>/<a href="register.php">Register</a></h3>
	</div>
	
<div id="pagewrap">
<div class="clear"></div>
<div id="navigation">
<a href="a2.php" id="home">Home</a>
<a href="index.html" id="about">About</a>
<a href="controller-scripts/display-lists.php" id="list">My Lists</a>
<a href="controller-scripts/display-recipes.php" id="recipes">Recipes</a>

</div>	

	<div id="main">

<?php
		if(!empty($old_user)){

			echo "You are now logged out! <br>";

		}else{

			echo "Hey, how did you get here? You weren't even logged in!";

		}
?>
	
   </div>
  </div>
   </body>
 </html>
