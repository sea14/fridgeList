<?php
date_default_timezone_set('America/New_York');

class list
{
	private $recipe_id;
	private $user_id;
	private $url;
	private $recipename;


	public static function create($user_id, $url, $recipename){

	require 'connect/dbconnect.php';
	
	$cleanUser = mysqli->real_escape_string($user_id);
	$cleanURL = mysqli->real_escape_string($url);
	$cleanName = mysqli->real_escape_string($recipename);

	$result = $mysqli->query("insert into users values '$cleanUser',
		'$cleanItems', '$cleanList')";

	if(result) {

		$recipe_id = $mysqli->insert_id;
		return new list($recipe_id, $user_id, $url, $recipename)
	}
	return null;
}

public static function getAllIDs() {
	require '../connect/dbconnect.php';
	
	$result = $mysqli->query("select recipe_id from recipes");
	$id_array = array();

	if ($result) {
		while ($next_row = $result->fetch_array()) {
			$id_array[] = intval($next_row['recipe_id']);
		}
	}
	return $id_array;
}

private function __construct($recipe_id, $user_id, $url, $recipename){

	$this->recipe_id = $recipe_id;
	$this->user_id = $user_id;
	$this->url = $url;
	$this->recipename = $recipename;
}

public function getID() {

	return $this->recipe_id;
}

public function getName() {

	return $this->recipename;
}

public function getUser() {

	return $this->user_id;
}

public function getItems(){

	return $this->url;
}

public function setItems(){

	$this->url = $url;
	return $this->$update;

}

public function setName(){

	$this->name = $recipe_name;
	return $this->$recipe_name;
}

private function update(){

	require '../connect/dbconnect.php';

	$cleanTitle = $mysqli->real_escape_string($this->recipename);
	$cleanURL = $mysqli->real_escape_string($this->url);	

	//needs more work but not sure how. too late to finish coding this class
}

public function delete(){
	
	require '../connect/dbconnect.php';

	$mysqli->query("delete from recipes where recipe_id = " . $this->recipe_id);

}

public function getJSON() {
	
	$json_obj = array('recipe_id' => $this->recipe_id,
			   'recipename' => $this->recipename,
			   'url' => $this ->url,
			   'user_id' => $this -> user_id
	}
     return json_encode($json_obj);
   }
}
