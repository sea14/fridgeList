<?php
  
        ini_set('display_errors',1);
        error_reporting(E_ALL);
        require 'connect/dbconnect.php';

                $firstName = (isset($_POST['firstName']) ? $_POST['firstName'] : null);
                $lastName = (isset($_POST['lastName']) ? $_POST['lastName'] : null);
                $email = (isset($_POST['email']) ? $_POST['email'] : null);
                $password = (isset($_POST['password']) ? $_POST['password'] : null);


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


?>
