<?php
	//this contains code for accessing recipes
	

	//get user by id
	function get_recipe_by_id($id)
	{
		$recipe_list = array();


		return $recipe_info;

	}

	function_get_recipe_list()
	{
	

		return $recipe_list
	}

	$recipe_url = array("get_recipe_list", "get_recipe");

	$value = "An error has occurred";

	if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
	{
	switch ($_GET["action])
	 {
	   case = "get_recipe_list";
		$value = get_recipe_list();
		break;
	   case "get_recipe";
		if (isset($_GET["id"]))
		   $value = get_recipe_by_id($_GET["id"]);
		else
			$value = "Missing argument";
		break;
	}

}

	//return json array
	exit(json_encode($value));
?>
