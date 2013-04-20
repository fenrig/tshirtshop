<?php

include_once("model/tshirt.php");
include_once("model/authentication.php");
include_once("model/regis.php");
include_once("model/tshirts.php");
include_once("includes/sql.php");

class Model{
	public function getTshirt(&$tid){		
		return new tshirt($tid);
	}

	public function getAuth(&$user,&$pass){
		return new auth_user($user,$pass);
	}

	public function getRegis(&$user,&$pass1,&$pass2) {
		return new reg_user($user,$pass1,$pass2);
	}

	public function getTshirts(&$number_of_page, &$size){
		return new tshirts($number_of_page,$size,NULL);
	}

	public function getSearch($general_term){
		$sql_string = 'SELECT * FROM `tshirt` INNER JOIN `clothings` ON tshirt.cid = clothings.cid WHERE';
		if($general_term != NULL){
			$sql_string .= ' clothings.description LIKE \'%' . $general_term . '%\'';
		}
		$sql  = new dbconnection();
		$result = $sql->query($sql_string);
		return new tshirts(NULL,NULL,$result);
	}
}

?>
