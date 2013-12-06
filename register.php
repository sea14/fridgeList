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

        //now that we've got user input, create a record for them in the db
        $stmt = $mysqli->prepare("INSERT INTO users VALUES (?, ?, ?, ?)");
        $stmt->bind_param($firstName, $lastName, $email, $coupon);


        //security checks on user input
        $firstName = isset($_POST['firstName'])
                ? $myqli->real_escape_string($_POST['firstName'])
                : '';

        $lastName = isset($_POST['lastName'])
                ? $mysqli->real_escape_string($_POST['lastName'])
                : '';

        $email = isset($_POST['email'])
                ? $mysqli->real_escape_string($_POST['email'])
                : '';

        $coupons = isset($_POST['coupons'])
                ? $mysqli->real_escape_string($_POST['coupons'])
                : '';

        //execute prepared statement
        $stmt->execute();

        printf("%d Row insterted.\n", $stmt->affected_rows);

        //close statement and connection
        $stmt->close();
        $mysqli->close();

?>

</html>
