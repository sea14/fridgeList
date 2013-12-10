<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();


 $content = $_POST['content']; //get posted data
 $content = mysqli_real_escape_string($content);  //escape string
 

 ?>

<!DOCTYPE html>
<meta charset=UTF-8>
  <head>
    <title>Fridge List</title>
	<link href="../style.css" rel="stylesheet" type="text/css" media="screen" />
	<script src="/Courses/comp426-f13/jquery-1.10.2.js"></script>
    <script src="groceryList.js"></script>
    <script src="groceryListViewer.js"></script>
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

  if(isset($_SESSION['user_id'])) {

    echo 'Welcome,' . $currentUser . '<br> You are logged in. Below, you may see and edit your lists. <br>';
    echo "Alternatively, you may also <a href='../logout.php'>logout</a>.";
  }
    else{

          echo "Hi there, do you want to <a href='../sign_in.php'>login?</a> or <a/> <a href='../register.php'>create an account?</a>";
    }

?>
<div id="groceryListViewer"></div>
	<div id="content">
		<div id="editable" contentEditable="true">
		<?php
		//get data from database.
			include("http://wwwp.cs.unc.edu/Courses/comp426-f13/seaustin/project/testing/dbconnect.php");
			$sql = mysqli_query("select listName, items from lists where user_id = 27");
			$row = mysqli_fetch_array($sql);
			echo $row['text'];
		?>
		</div>
</div>
<br />
Don't have any lists? Create some using the form below!<br /><br />

<form id="new_list_form">
	Grocery List Name: <input name=listName type=text><br />
	Items: <input name=items type=text size=70><br /><br />
	<button id="save">Create A New Grocery List</button>
</form>

 <?php

    $sql = "UPDATE lists
            SET text = '$content'
            WHERE element_id = '1'
            ";
 
    if (mysqli_query($sql))
    {
        echo 1;
    }
 
?>


   </div>
  </div>



   </body>
 </html>