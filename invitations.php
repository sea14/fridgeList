<?php

 <!--holds  a user invitations. if not logged in, asks for them to do so-->

//check to see if user is logged in
 <?php

	if(isset($_SESSION['valid_user'])) {
		//user has logged in
	echo 'Welcome, ' . $_SESSION['valid_user'] . '<br>' . 'Your invitations are listed below.';
	}else{
			echo "You're not logged in -- would you please do so below?";
	}
}


?>

?>
