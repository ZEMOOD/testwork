<?php
// load autoloder
require_once('./system/autoloader.php');
// autoloder object
$autoloader = new ClassAutoloader();

spl_autoload_call('loader');
// create application object 
$application = new application($autoloader);

// close core autoloder
$autoloader->clear_loader('loader_core');


//$application->load_controller('main');


