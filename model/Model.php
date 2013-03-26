<?php

include_once("model/tshirt.php");
include_once("model/authentication.php");

class Model{
	public function getTshirt(){
		$returnvalue = new tshirt("tshirtname");
		return $returnvalue;
	}
	public function getAuth(){

	}
}

?>