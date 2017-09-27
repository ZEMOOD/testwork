<?php
// class for url to controller->func
class routes{
	protected 
		$application = "",
		$url = "",
		$routes = ""; 

	public function __construct($application){
		$this->application = $application;
		$this->routes = include_once('./application/config/routes.php');

		
	}

	public function get_controller_path(){
		$controllerPath = "";

		$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,strpos( $_SERVER["SERVER_PROTOCOL"],'/'))).'://';
		$this->url = strtok($protocol.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"],'?');

		$this->url = substr($this->url, strlen($this->application->config['base_url'])); 
		if($this->url == ""){
			$controllerPath = array(
				'name' => $this->routes['default_controller'], 
				'func' => "main_page"
			);

		}else{
			$controllerPath = explode('/', $this->url);
			if((!isset($controllerPath[1]))||($controllerPath[1] == "")) $controllerPath[1] = "main_page";
			$controllerPath = array(
				'name' => $controllerPath[0], 
				'func' => $controllerPath[1]
			);
		}
		return $controllerPath;
	} 


}