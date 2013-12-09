
<!DOCTYPE html>
<meta charset=UTF-8>
    <title>Fridge List</title>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
  

  <script type="text/javascript">
  $("#loginForm").submit(function(e){
    e.preventDefault();
    $.post('sign_in.php', $(this).serialize(), function(data){

      $("#showusers").load("model-views/user.php");
      $("#userinfo").text(data);
      $("#loginForm").remove();

     });

 });

  </script> 
  </head>
  <body>

<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
  //require db connection
  require 'connect/dbconnect.php';

  //check if username and password are set. if so, try to log user in
  if(isset($_POST['email']) && isset($_POST['password']) ){

    //I hate to do this without prepared statements, buuut, in the interest of getting it operational
  

    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string(md5($_POST['password']));

    $query = "SELECT firstName, lastName FROM users WHERE email = '$email' "."and password = '$password'";

    $result = mysqli_query($mysqli, $query) or die(mysqli_error ());

    $num_rows = mysqli_num_rows($result);


   if($num_rows > 0){

        $_SESSION['email'] = $row['email'];
        
      }else{

       

      }
  }


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
	<p><a href="register.php">Register</a> or <a href="sign_in.php">sign in</a> to start creating your grocery lists!<br /></p><br />


	<form method = "post" id="loginForm"  action = "sign_in.php">
        Email: <input type="text" id="email"  name="email"><br>
        Password: <input type="password" id="password"  name="password"><br>
   <input type="submit" id="submit" value="submit">



    <?php

      if(isset($_POST['email']) && isset($_POST['password']) ){


         if($num_rows > 0){

        $_SESSION['email'] = $row['email'];

          echo "<br><h2>Congratulations! You are logged in now!</h2>";
        
      }else{

        echo "<br><h2>Sorry, we could not log you in successfully.</h2>";       

       }
    }
?>
      </div>


   </body>
 </html>