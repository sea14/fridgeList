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

	$result = $mysqli->query("insert into users values '$cleanUser',
		'$cleanItems', '$cleanList')";

	if(result) {

		$list_id = $mysqli->insert_id;
		return new list($list_id, $user_id, $items, $listName)
	}
	return null;
}


	}

	}
