<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();



?>
<!DOCTYPE html>
<meta charset=UTF-8>
    <title>Fridge List</title>
	<link href="../style.css" rel="stylesheet" type="text/css" media="screen" />
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
  

  </head>
  <body>




 <div id="logo">
  <a href="../a2.php"><img src="../fridgeList_logo.png" alt="Fridge List Logo"></a>
 <p>&nbsp; &nbsp; an application designed for the busy and hungry! 
  </div> 
  
  <div id="register">
	<h3><a href="../sign_in.php">Sign In</a>/<a href="../register.php">Register</a></h3>
	</div>
	
<div id="pagewrap">
<div class="clear"></div>
<div id="navigation">
<a href="../a2.php" id="home">Home</a>
<a href="http://www.cs.unc.edu/Courses/comp426-f13/seaustin/project/index.html" id="about">About</a>
<a href="display-lists.php" id="list">My Lists</a>
<a href="display-recipes.php" id="recipes">Recipes</a>

</div>	

	<div id="main">
	<p><a href="../register.php">Register</a> or <a href="../sign_in.php">sign in</a> to start creating your grocery lists!<br /></p><br />

<?php

    if(isset($_SESSION['user_id']) ){

    echo 'Welcome,' . $currentUser . '<br> You are logged in. Below, you may see and edit your recipes.';
  }
    else{

          echo "Hi there, do you want to <a href='../sign_in.php'>login?</a> or <a/> <a href='../register.php'>create an account?</a>";
    }


?>

  </div>



   </body>
 </html>