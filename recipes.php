<?php

<!--recipes.php holds a user's created recipes. if a user isn't logged in, it asks them to do so -->

	class recipe
	{
		public $recipe_id = '' //recipe id, pk
		public $name = ''; //recipe name
		public $url = ''; //recipe url
	}

	//functions will go below here, not sure what they'll be yet


?>

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
