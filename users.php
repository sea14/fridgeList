<?php
	//this contains code for accessing users
	

	//get user by id
	function get_user_by_id($id)
	{
		$users_list = array();


		return $users_info;

	}

	function_get_user_list()
	{
	

		return $user_list
	}

	$user_url = array("get_user_list", "get_user");

	$value = "An error has occurred";

	if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
	{
	switch ($_GET["action])
	 {
	   case = "get_user_list";
		$value = get_user_list();
		break;
	   case "get_user";
		if (isset($_GET["id"]))
		   $value = get_user_by_id($_GET["id"]);
		else
			$value = "Missing argument";
		break;
	}

}

	//return json array
	exit(json_encode($value));
?>
