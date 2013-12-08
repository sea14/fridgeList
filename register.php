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
            $("#main").append("Oops! Your email address was not valid!");
        }
        else {
            $("#main").append("Congratulations! You successfully created an account!");
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

                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $email = $_POST['email'];
                $password = $_POST['password'];

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
<a href="list.php" id="list">My List</a>
<a href="recipes.php" id="recipes">Recipes</a>

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