<?php

include_once("model/tshirt.php");
include_once("model/authentication.php");

class Model{
	public function getTshirt($tid){
		$returnvalue = new tshirt($tid);
		return $returnvalue;
	}
	public function getAuth($user,$pass){
		$authentication_result = new auth_user($user,$pass); 
		return $authentication_result;
	}
}

?>