<?php
session_start();
echo session_id();
echo $first;

?>

<!DOCTYPE html>
<meta charset=UTF-8>
  <head>
    <title>Fridge List</title>
	<link href="../style.css" rel="stylesheet" type="text/css" media="screen" />
	<script src="/Courses/comp426-f13/jquery-1.10.2.js"></script>
    <script src="../groceryList.js"></script>
    <script src="../groceryListViewer.js"></script>

  </head>
  <body>

  	<?php

  		require '/afs/cs.unc.edu/project/courses/comp426-f13/public_html/seaustin/project/connect/dbconnect.php';
  		if(isset($_POST['save'])){

  			
  			$listname = isset($_POST['listname']);
  			$items = isset($_POST['items']);

  			$query = "INSERT into lists ('listname', 'items') VALUES (?, ?)";
  			if($stmt->prepar($query)){

  				$stmt->bind_param('ss', $listname, $items);
  				$stmt->execute();

  			}
  			if($stmt){

  				echo "Congratulations! You created a new list!";

  			}else{

  				echo "Uh-oh, there was an error. Please try again.";

  			}

  		}


  	?>




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

    echo 'Welcome,' . $_SESSION['user_id'] . '<br> You are logged in. Below, you may see your lists. <br>';


    //connect to db
    //query for user's lists
    //output them in a table



    echo "Alternatively, you may also <a href='../logout.php'>logout</a>.";
  }
    else{

          echo "Hi there, do you want to <a href='../sign_in.php'>login?</a> or <a/> <a href='../register.php'>create an account?</a>";
    }

?>
<div id="groceryListViewer"></div>
	<div id="content">
</div>
<br />
<p>Don't have any lists? Create a list using the form below!<br /><br />

<form id="new_list_form" action="display-lists.php">
	Grocery List Name: <input name='listname' id='listname' type=text><br />
	Items: <input id='items' name='items' type=text><br /><br />
	<button id="save" name="save">Create A New Grocery List</button>
</form>
   </div>
  </div>



   </body>
 </html>