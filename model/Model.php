<?php

include_once("model/tshirt.php");
include_once("model/authentication.php");
include_once("model/regis.php");

class Model{
	public function getTshirt($tid){
		$returnvalue = new tshirt($tid);
		return $returnvalue;
	}
	public function getAuth($user,$pass){
		$authentication_result = new auth_user($user,$pass); 
		return $authentication_result;
	}
	public function getRegis($user,$pass1,$pass2) {
		$register_result = new reg_user($user,$pass1,$pass2);
		return $register_result;
	}
}

?>
