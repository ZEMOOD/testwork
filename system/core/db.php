<?php
// database class
class db{

	private 
		$configDB = "",
		$connect = "";

	public function __construct(){
		$configDB =  include_once('./application/config/db.php');
		$connect = mysql_connect($configDB['host'], $configDB['login'], $configDB['password']);
		mysql_select_db($configDB['db_name'], $connect);
		
	}

	public function query($query_string){

		$query = mysql_query($query_string);

		if (!$query) {
		    echo "DB ERROR! (3)";
		    echo "(".$query_string.")";
		    exit();
		}

		$result = "";
		while($data = mysql_fetch_object($query)){
			$result[] = $data;
		}

		return $result;
	}
}