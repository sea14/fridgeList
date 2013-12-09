<!DOCTYPE html>
<head>
<meta charset=UTF-8>
<title>Fridge List</title>
<link href="../style.css" rel="stylesheet" type="text/css" media="screen" />
<script src="http://code.jquery.com/jquery-latest.min.js"></script>


<script type = "text/javascript">

$(document).ready(function() {
    function ValidateEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    };
    $("#submit").on("click", function () {
        if (!ValidateEmail($("#txtEmail").val())) {
            alert("Oops! Your email address was not valid!");
        }
        else {
            alert("Congratulations! You successfully created an account!");
        }
    });
  });
</script>


</head>
  
  <body>

<?php
        ini_set('display_errors',1);
        error_reporting(E_ALL);

        //require the db connection
        require 'connect/dbconnect.php';

        
        //if everything is set
        if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['password'])){

          //if email is valid for real, so we don't erroneously populate the db
          $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

          $emailaddress = $_POST['email'];

          if (preg_match($pattern, $emailaddress) === 1) {


                  $firstName = $_POST['firstName'];
                  $lastName = $_POST['lastName'];
                  $email = $_POST['email'];
                  $password = md5($_POST['password']);

          //here's our query
          $sql = "INSERT INTO users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)";

          if($stmt = $mysqli->prepare($sql)) {


            $stmt->bind_param('ssss', $firstName, $lastName, $email, $password);
            $stmt->execute();


  while($stmt->fetch()){

            }

            } else{

            echo "prepare failed";
        }
        $stmt->close();
        $mysqli->close();
      }

  }
?>




  <div id="logo">
  <a href="a2.php"><img src="../fridgeList_logo.png" alt="Fridge List Logo"/></a>
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
  <h2>Register for a Fridge List Account:</h2>
        <p>

        <form method = "post" action = "register.php" id="register-form">
        First Name: <input type="text" name="firstName" id="firstname"><br>
      

        Last Name: <input type="text" name="lastName" id="lastname"><br>
        Email: <input type="text" name="email" id="txtEmail"><br>
        Password: <input type="password" name="password" id="password"><br>
  <input type="submit" value="submit" id="submit">

        </form>
        </p>
   </div>

</body>

</html>