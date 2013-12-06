<!DOCTYPE html>
<head>
        <title>Register</title>
</head>
<body>

<?php

        //connect to db
        require 'connect/dbconnect.php';

        //get user input, html form below
?>

<div id="pagewrap">
  <div id="header">
  <img src="images/fridgeList_logo.png" alt="Fridge List Logo"></img>
  </div>

<div class="clear"></div>
   
  <div id="register">
        <a href="sign_in.html">Sign In</a>/<a href="register.html">Register</a>
        </div>
        
  <div id="navigation"> 
                <a href="#" id="mylist">My List</a>
                <a href="#" id="recipes">Recipes</a>
                <a href="#" id="invitations">Invitations</a>
  </div>

  <div id="main">
        <p>
        <form method = "POST" action = "register.php">
        First Name:<input type="text" name="firstName"><br>
        Last Name:<input type="text" name="lastName"><br>
        Email:<input type="text" name="email"><br>
        Confirm Email:<input type="text" name="confirm"><br>
        Password:<input type="text" name="password"><br>
        Coupons?<input type = "checkbox" value = "Yes"><br>
        </form>
        </p>
   </div>

<?php

$sql = "INSERT INTO users (firstName, lastName, email, password, coupons) VALUES (?, ?, ?, ?, ?)";

//still needs security check written
if($stmt = $mysqli->prepare($sql)) {

            //bind parameters
            $stmt->bind_param('sssss', $firstName, $lastName, $password, $email, $coupons);
            $stmt->execute();
            $stmt->bind_result($firstName, $lastName, $password, $email, $coupons);
            while($stmt->fetch()){
                echo 'Hello, ' . $firstName . ' '. $lastName . 'Your email is ' . $email;

            }
           
            } else{

            echo "prepare failed";
        }
        $stmt->close();
        $mysqli->close();
        echo "Done";

?>

</html>
