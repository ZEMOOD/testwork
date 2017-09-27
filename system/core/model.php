<?php
// parent model class
class model{
	
	public 
		$db = "";

	public function __construct(){
		$this->db =  new db;
	}
}