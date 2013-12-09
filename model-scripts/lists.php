<?php
date_default_timezone_set('America/New_York');

class list
{
	private $list_id;
	private $user_id;
	private $items;
	private $listName;


	public static function create($user_id, $items, $listName){

	require 'connect/dbconnect.php';
	
	$cleanUser = mysqli->real_escape_string($user_id);
	$cleanItems = mysqli->real_escape_string($items);
	$cleanList = mysqli->real_escape_string($listName);

	$result = $mysqli->query("insert into lists values '$cleanUser',
		'$cleanItems', '$cleanList')";

	if(result) {

		$list_id = $mysqli->insert_id;
		return new list($list_id, $user_id, $items, $listName)
	}
	return null;
}

public static function getAllIDs() {
	require '../connect/dbconnect.php';
	
	$result = $mysqli->query("select list_id from lists");
	$id_array = array();

	if ($result) {
		while ($next_row = $result->fetch_array()) {
			$id_array[] = intval($next_row['list_id']);
		}
	}
	return $id_array;
}

private function __construct($list_id, $user_id, $items, $listName){

	$this->list_id = $list_id;
	$this->user_id = $user_id;
	$this->items = $items;
	$this->listName = $listName;
}

public function getID() {

	return $this->id;
}

public function getName() {

	return $this->listName;
}

public function getUser() {

	return $this->user_id;
}

public function getItems(){

	return $this->items;
}

public function setItems(){

	$this->items = $items;
	return $this->$update;

}

public function setName(){

	$this->name = $list_name;
	return $this->$list_name;
}

private function update(){

	require '../connect/dbconnect.php';

	$cleanTitle = $mysqli->real_escape_string($this->listName);
	$cleanItems = $mysqli->real_escape_string($this->items);	

	//needs more work but not sure how. too late to finish coding this class
}

public function delete(){
	
	require '../connect/dbconnect.php';

	$mysqli->query("delete from lists where list_id = " . $this->list_id);

}

public function getJSON() {
	
	$json_obj = array('list_id' => $this->list_id,
			   'list_name' => $this->list_name,
			   'items' => $this->items,
			   'user_id' => $this->user_id
	}
     return json_encode($json_obj);
   }
}
