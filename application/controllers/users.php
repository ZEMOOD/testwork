<?php
class users extends controller{
	// Login form submmit here
	public function login(){

		$login = addslashes($_POST['login']);	
		$pass = addslashes($_POST['pass']);

		$user = $this->load->model('user');
		// try enter
		$result = $user->enter($login, $pass);

		if(strlen($login) < 3){
			$result = "WRONG LOGS (* too short)!";
		}

		if(strlen($pass) < 3){
			$result = "WRONG LOGS (* too short)!";
		}

		// succsess is (+) other Error
		echo $result;
		

	}

	// user logout
	public function logout(){
		setcookie("uid", '', time()+(60*60*24*30), '/');
    	setcookie("utoken", '', time()+(60*60*24*30), '/');
    	header('location: '.$this->config['base_url']);
    	exit();
	}

	// user registration
	public function rega(){
		$login = addslashes($_POST['login']);	
		$email = addslashes($_POST['email']);	
		$pass = addslashes($_POST['pass']);
		$pass2 = addslashes($_POST['pass2']);

		if(strlen($login) < 3){
			echo  $result = "WRONG LOGIN (* too short [> 3])!";
			exit();
		}

		if(strlen($pass) < 3){
			echo   $result = "WRONG PASS (* too short [> 3])!";
			exit();
		}

		if($pass!=$pass2){
			echo   $result = "WRONG PASS (* wrong repeat)!";
			exit();
		}

		if(strlen($email) < 3){
			echo   $result = "WRONG EMAIL (* too short [> 3])!";
			exit();
		}

		$user = $this->load->model('user');
		$result = $user->reg($login, $pass, $email);

		// succsess is (+) other Error
		echo $result;

		
	}
}