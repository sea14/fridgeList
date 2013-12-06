 <?php

        require 'connect/dbconnect.php';


          $sql = "INSERT INTO users (firstName, lastName, email, password) VALUES (?, ?, ?, ?)";

          if($stmt = $mysqli->prepare($sql)) {

        
            $stmt->bind_param('ssss', $firstName, $lastName, $password, $email);
            $stmt->execute();

            while($stmt->fetch()){
               echo "test";
            }
           
            } else{

            echo "prepare failed";
        }
        $stmt->close();
        $mysqli->close();
        echo "Done";

?>
