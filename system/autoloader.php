<?php
// autoloder classes
class ClassAutoloader {

    public function __construct() {
		// register for core classes
		spl_autoload_register(array($this, 'loader_core'));
    }
    # reg autoloder rule
    // $func = (str) autoloder->func name
    public function reg_loader($func){
    	// register to other patches
    	spl_autoload_register(array($this, $func));
    }
    # delete autoloder rule
    // $func = (str) autoloder->func name
    public function clear_loader($func){
    	// clear registred autoloder
    	spl_autoload_unregister(array($this, $func));
    }
    # core autoloder
    // $className = (str) class name to load
   	private function loader_core($className) {
		if(file_exists('./system/core/'. $className . '.php')){
			include './system/core/'. $className . '.php';
			return true;
		}else{
			return false;
		}
    }
    # controllers autoloder
    // $className = (str) class name to load
    private function loader_controllers($className) {
		if(file_exists('./application/controllers/'. $className . '.php')){
			include './application/controllers/'. $className . '.php';
			return true;
		}else{
			return false;
		}
    }
    # models autoloder
    // $className = (str) class name to load
    private function loader_models($className) {
		if(file_exists('./application/models/'. $className . '_model.php')){
			include './application/models/'. $className . '_model.php';
			return true;
		}else{
			return false;
		}
    }
    

}