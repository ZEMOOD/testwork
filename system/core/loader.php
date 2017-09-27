<?php
// Load models and views (maybe other)
class loader{

	# execute view
	// $path = (str) view path local in view (with name, without ext)
	// $vars = (array) vars to execute in view
	// $rformat = (bool) return format (true json | false - echo)
	public function view($path, $vars = array('none'=>'none')){
		extract ($vars);
		// load view into string
		$viewFile = file_get_contents('./application/views/'.$path.'.php');
		// execute php code
       	$viewFile = eval('?>'.$viewFile);
       	// echo view string 
        echo  $viewFile;
	}

	# add model into controller
	// $name = (str) model class name
	public function model($name){
		return  new $name();
	}
}