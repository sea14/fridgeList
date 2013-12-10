<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();

?>

<!DOCTYPE html>
<meta charset=UTF-8>
  <head>
    <title>Fridge List</title>
	<link href="../style.css" rel="stylesheet" type="text/css" media="screen" />
	<script src="/Courses/comp426-f13/jquery-1.10.2.js"></script>
    <script src="../groceryList.js"></script>
    <script src="../groceryListViewer.js"></script>

    <script type="text/javascript">

    	$(function()){

    		$('#save').click(function(){

    			var listname = $('#listname').val();
    			var items = $('#items').val();

    			$.ajax({

    				url: 'display-lists.php',
    				type: 'POST',
    				data: 'listname ='+listname +'&items=' + items,

    				success: function(result){

    				});

    		}

    	});
  });

  </head>
  <body>

  	<?php

  		require '../connect/dbconnect.php';
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

    echo 'Welcome,' . $currentUser . '<br> You are logged in. Below, you may see and edit your lists. <br>';
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
<p>Create a list using the form below!<br /><br />

<form id="new_list_form" action="display-lists.php">
	Grocery List Name: <input name='listName' id='listname' type=text><br />
	Items: <input id='items' name='items' type=text size=70><br /><br />
	<button id="save">Create A New Grocery List</button>
</form>
   </div>
  </div>



   </body>
 </html>