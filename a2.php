
<!DOCTYPE html>
<meta charset=UTF-8>
    <title>Fridge List</title>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
	<script src="scripts.js"></script>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
  </head>
  
  <body>

  	<?php
    ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
    session_start();


  if(isset($_SESSION['email'])){

    echo 'Welcome,' . $_SESSION['email'] . '<br> You are logged in. Below, you may see and edit your recipes.';
  }
    else{

          echo "Hi there, do you want to <a href='sign_in.php'>login?</a> or <a/> <a href='register.php'>create an account?</a>";
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
<a href="a2.php" id="home">Home</a>
<a href="index.html" id="about">About</a>
<a href="controller-scripts/display-lists.php" id="list">My List</a>
<a href="controller-scripts/display-recipes.php" id="recipes">Recipes</a>

</div>	

	<div id="main">
	<p><a href="register.php">Register</a> or <a href="sign_in.php">sign in</a> to start creating your grocery lists!<br /></p><br />
	<p>Welcome to FridgeList! This is an application for creating grocery lists and saving your favorite recipe links in one convenient place!</p>
   </div>
  </div>
   </body>
 </html>
