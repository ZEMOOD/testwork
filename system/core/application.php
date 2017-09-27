<?php 
// MAIN CORE CLASS
class application{

	private 
		// autoloder class
		$autoloder = "",
		// routes class
		$routes = "";

	public	
		// config class
		$config = "";
		

	public function __construct($autoloder){
		// autoloder
		$this->autoloder = $autoloder;
		// load core classes to extends
		spl_autoload_call('controller');
		spl_autoload_call('db');
		spl_autoload_call('model');
		// load config array
		$this->config = include_once('./application/config/config.php');
		// url engine
		$this->routes = new routes($this);
		// get path to controller from url
		$appPath = $this->routes->get_controller_path();
		// load controller
		$this->load_controller($appPath['name'], $appPath['func']);
	}
	# Load controller
	// $name = (str) class name
	// $func = (str) method name 
	public function load_controller($name, $func){
		// autoloder for controlers
		$this->autoloder->reg_loader('loader_controllers');
		// load controller
		$this->controller = new $name($this->config);
		// [END] autoloder for controlers
		$this->autoloder->clear_loader('loader_controllers');
		// autoloder for models
		$this->autoloder->reg_loader('loader_models');
		// run method
		call_user_func(array($this->controller, $func));
		// [END] autoloder for models
		$this->autoloder->clear_loader('loader_models');
	}


}