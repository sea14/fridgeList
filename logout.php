<!DOCTYPE html>
<meta charset=UTF-8>
    <title>Fridge List</title>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
  </head>

<?php
	ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
	session_start();
	$old_user = $_SESSION['email'};
	$_SESSION = array();
	if (isset_($_COOKIE[session_name()])) {

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
<a href="display-lists.php" id="list">My Lists</a>
<a href="display-recipes.php" id="recipes">Recipes</a>

</div>	

	<div id="main">
	
   </div>
  </div>
   </body>
 </html>
