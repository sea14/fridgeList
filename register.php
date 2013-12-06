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
        Coupons?<input type = "checkbox" value = "Yes"><br>
        </form>
        </p>
   </div>

<?php

$sql = "INSERT INTO users (firstName, lastName, email, coupons) VALUES (?, ?, ?, ?)";

//still needs security check written
if($stmt = $mysqli->prepare($sql)) {

            //bind parameters
            mysqli_stmt_bind_param($stmt,'ssss' $firstName, $lastName, $email, $coupons);
            $stmt->execute($stmt);
            $stmt->bind_result($firstName, $lastName, $email, $coupons);
          
            //insert
            mysqli_stmt_execute($stmt);
            } else{

            echo "prepare failed";
        }
        mysqli_stmt_close();
        mysqli_close();
        echo "Done";

?>

</html>
