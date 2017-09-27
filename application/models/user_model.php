<?php

class user extends model{

	private 
		$users_table = "users";

	// Try auth from cookies	
    public function auth(){
    	if((isset($_COOKIE['uid']))&&(isset($_COOKIE['utoken']))){
    		// user->id in cookies
    		$uid = addslashes($_COOKIE['uid']);
    		// user token (md5)
    		$utoken = addslashes($_COOKIE['utoken']);
    		$result = $this->db->query("SELECT * FROM ".$this->users_table." WHERE id='".$uid."'");
    		if(count($result) > 0){

    			$data = $result[0];
    			// verify cookie token
    			if($utoken == md5($uid.$data->email.$data->login."7312")){
    				// auth compeate success
    				return $data;
    			}else{
    				// fail bad token
    				setcookie("uid", '', time()+(60*60*24*30), '/');
    				setcookie("utoken", '', time()+(60*60*24*30), '/');
    				return false;
    			}
    		}else{
    			// fail no user by id
    			setcookie("uid", '', time()+(60*60*24*30), '/');
    			setcookie("utoken", '', time()+(60*60*24*30), '/');
    			return false;
    		}
    	}else{
    		// fail no cookies
    		return false;
    	}
    }

    // Try enter from values form
    public function enter($login, $pass){
    	$pass = md5($pass);
    	$result = $this->db->query('SELECT * FROM `'.$this->users_table.'` WHERE `login`="'.$login.'" AND `pass`="'.$pass.'"');

    	if(count($result) > 0){
    		$data = $result[0];
    		// generete token
    		$utoken = md5($data->id.$data->email.$data->login."7312");
    		$uid = $data->id;
    		// write users cookie for auth
    		setcookie("uid", $uid, time()+(60*60*24*30), '/');
    		setcookie("utoken", $utoken, time()+(60*60*24*30), '/');
    		return "+";
    		
    	}else{
    		// fail wrong users values
    		return "WRONG LOGS!";
    	}
    }

    // add user from reg form
    public function reg($login, $pass, $email){
    	$pass = md5($pass);
    	$query = $this->db->query('INSERT INTO `'.$this->users_table.'` (`login`, `email`, `pass`, `utype`) VALUES ("'.$login.'", "'.$email.'", "'.$pass.'", "0")');
  
    	return "+";
   
    }
    

}