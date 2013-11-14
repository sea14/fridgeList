<?php

<!--recipes.php holds a user's created recipes. if a user isn't logged in, it asks them to do so -->

//check to see if user is logged in
 <?php

	if(isset($_SESSION['valid_user'])) {
		//user has logged in
	echo 'Welcome, ' . $_SESSION['valid_user'] . '<br>' . 'Your recipes are listed below.';
	}else{
			echo "You're not logged in -- would you please do so below?";
	}
}


?>

?>



?>
