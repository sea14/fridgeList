<?php
session_start();
echo session_id();
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
<a href="wwwp.cs.unc.edu/Courses/comp426-f13/seaustin/project/index.html" id="about">About</a>
<a href="display-lists.php" id="list">My Lists</a>
<a href="display-recipes.php" id="recipes">Recipes</a>

</div>	

	<div id="main">
	<p><a href="../register.php">Register</a> or <a href="../sign_in.php">sign in</a> to start creating your grocery lists!<br /></p><br />

<?php

   
    echo 'Welcome, ' . $_SESSION['user_id'] . '<br> You are logged in. Below, you may see your lists. <br>';


    //connect to db
    //query for user's lists
    //output them in a table



    echo "Alternatively, you may also <a href='../logout.php'>logout</a>.";

?>

  </div>



   </body>
 </html>