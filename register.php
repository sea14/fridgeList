
<!DOCTYPE html>
<meta charset=UTF-8>
    <title>Fridge List</title>
  <link href="style.css" rel="stylesheet" type="text/css" media="screen" />
  </head>
  
  <body>

  <div id="logo">
  <a href="a2.html"><img src="fridgeList_logo.png" alt="Fridge List Logo"></img></a>
 <p>&nbsp; &nbsp; an application designed for the busy and hungry! 
  </div> 
  
  <div id="register">
  <h3><a href="sign_in.php">Sign In</a>/<a href="register.php">Register</a></h3>
  </div>
  
<div id="pagewrap">
<div class="clear"></div>
<div id="navigation">
<a href="a2.html" id="home">Home</a>
<a href="index.html" id="about">About</a>
<a href="list.php" id="list">My List</a>
<a href="recipes.php" id="recipes">Recipes</a>

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

        //connect to db
        require 'connect/dbconnect.php';


$sql = "INSERT INTO users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)";

//still needs security check written
if($stmt = $mysqli->prepare($sql)) {

            //bind parameters
            $stmt->bind_param('ssss', $firstName, $lastName, $password, $email);
            $stmt->execute();

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
