<?php

include_once("model/tshirt.php");
include_once("model/authentication.php");
include_once("model/regis.php");
include_once("model/tshirts.php");
include_once("includes/sql.php");

function searchfilter_checkboxes(&$sql_string, $sql_col_string, $value_array, &$checkifconcatAND){
	if($value_array != NULL){
		$checkifconcatOR = FALSE;
		if($checkifconcatAND){
			$sql_string .= ' AND';
		}
		$sql_string .= ' (';
		foreach($value_array as $value){
			if($checkifconcatOR){
				$sql_string .= ' OR';
			}
			$sql_string .= ' ' . $sql_col_string . ' = \'' . $value . '\'';
			$checkifconcatOR = TRUE;
		}
		$sql_string .= ' )';
		$checkifconcatAND = TRUE;
	}
	
}

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

	public function getSearch($general_term,$colors,$brands,$fabrics,$agegroup,$sex){
		$checkifconcatAND = FALSE;
		$sql_string = 'SELECT * FROM `tshirt` INNER JOIN `clothings` ON tshirt.cid = clothings.cid WHERE';
		if($general_term != NULL){
			$sql_string .= ' clothings.description LIKE \'%' . $general_term . '%\'';
			$checkifconcatAND = TRUE;
		}
		if($agegroup != NULL){
			if($checkifconcatAND){
				$sql_string .= ' AND';
			}
			$sql_string .= ' clothings.agegroup = \'' . $agegroup . '\'';
			$checkifconcatAND = TRUE;
		}
		if($sex != NULL){
			if($checkifconcatAND){
				$sql_string .= ' AND';
			}
			$sql_string .= ' ( clothings.sex = \'' . $sex . '\' OR  clothings.sex LIKE \'unisex\' )';
			$checkifconcatAND = TRUE;
		}

		searchfilter_checkboxes($sql_string, "clothings.color", $colors, $checkifconcatAND);
		searchfilter_checkboxes($sql_string, "clothings.brand", $brands, $checkifconcatAND);
		searchfilter_checkboxes($sql_string, "clothings.fabric", $fabrics, $checkifconcatAND);

		#echo $sql_string;

		$sql  = new dbconnection();
		$result = $sql->query($sql_string);
		return new tshirts(NULL,NULL,$result);
	}
}

?>
