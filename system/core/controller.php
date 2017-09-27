<?php
// Controller to extends
class controller{

	protected
		// load class 
		$load = "",
		$config = "";

	public function __construct($config){
		$this->config = $config;
		// add loader to controller	
		$this->load = new loader($this);
	}



} 