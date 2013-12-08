<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
  //require db connection
  require 'connect/dbconnect.php';

  //check if username and password are set. if so, try to log user in
  if(isset($_POST['email']) && isset($_POST['password']) ){

    $stmt = $mysqli->prepare("SELECT email FROM users WHERE email=? AND password=?");

    $email = $_POST['email'];
    $password = md5($_POST['password']);



    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $stmt->bind_result($email, $password);
    $stmt->fetch(); 

  
  $stmt->close();
  mysqli_close($mysqli);

}

?><!DOCTYPE html>
<meta charset=UTF-8>
    <title>Fridge List</title>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
  

  <!--<script type="text/javascript">
  $(function() {
        var action = '';
        var form_data = '';
        $('#submit').click(function () {
                action = $("#loginForm").attr("action");
                form_data = {
                email: $("#email").val(),
                password: $("#password").val(),
                is_ajax: '1'};

        $.ajax({
                type: 'POST',
                url: action,
                data: form_data,
                success: function(response) {
                        if(response == 'success') {
                                $("#loginForm").slideUp('slow', function() {
                                        $("#message").html('<p class="success">You have logged in successfully!</p>');
                                });
                        } else {
                                $("#message").html('<p class = error"> Invalid username and/or password.</p>');
                        }
                }
        });
        return false;
    })

}); 

  </script> -->
  </head>
  <body>




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
<a href="lists.php" id="list">My List</a>
<a href="recipes.php" id="recipes">Recipes</a>

</div>	

	<div id="main">
	<p><a href="register.php">Register</a> or <a href="sign_in.php">sign in</a> to start creating your grocery lists!<br /></p><br />


	<form method = "post" id="loginForm"  action = "sign_in.php">
        Email: <input type="text" id="email"  name="email"><br>
        Password: <input type="password" id="password"  name="password"><br>
   <input type="submit" id="submit" value="submit">

   <div id="userinfo"><?php echo $email; ?>

   </div>
  </div>



   </body>
 </html>