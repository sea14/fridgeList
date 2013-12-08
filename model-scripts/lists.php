<?php
	//this contains code for accessing lists
	

	//get user by id
	function get_list_by_id($id)
	{
		$lists_list = array();


		return $lists_info;

	}

	function_get_lists_list()
	{
	

		return $lists_list
	}

	$user_url = array("get_lists_list", "get_list");

	$value = "An error has occurred";

	if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
	{
	switch ($_GET["action])
	 {
	   case = "get_lists_list";
		$value = get_lists_list();
		break;
	   case "get_list";
		if (isset($_GET["id"]))
		   $value = get_list_by_id($_GET["id"]);
		else
			$value = "Missing argument";
		break;
	}

}

	//return json array
	exit(json_encode($value));
?>
