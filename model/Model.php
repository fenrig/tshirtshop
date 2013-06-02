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
	public function addTshirt(&$price, &$color, &$brand, &$agegroup, &$sex, &$fabric, &$description, &$format, &$sleeves){
		$sql = new dbconnection();
		$result = $sql->query("INSERT INTO `clothings`(`cid`, `price`, `color`, `brand`, `agegroup`, `sex`, `fabric`, `description`) VALUES (NULL, '$price', '$color', '$brand', '$agegroup', '$sex', '$fabric', '$description')");
		$result = $sql->query("SELECT `cid` FROM `clothings` WHERE `description` = '$description' AND `color` = '$color' AND `brand` = '$brand' AND `agegroup` = '$agegroup'  AND `sex` = '$sex' AND `fabric` = '$fabric'");
		$row = mysqli_fetch_row($result);
		$result = $sql->query("INSERT INTO `tshirt`(`tid`, `cid`, `format`, `sleeves`) VALUES (NULL, '$row[0]', '$format', '$sleeves')");
		return $row[0];
	}

	public function getTshirt(&$tid){
		$sql  = new dbconnection();
		$result = $sql->query('SELECT * FROM `tshirt` inner join `clothings` on tshirt.cid = clothings.cid where tshirt.tid = '. $tid);
		if(mysqli_num_rows($result) > 0){
			return new tshirts_element(mysqli_fetch_array($result));
		}
		return NULL;	
	}
public function getOrder(&$cid){
		$sql  = new dbconnection();
		$result = $sql->query('SELECT * FROM `tshirt` inner join `clothings` on tshirt.cid = clothings.cid where tshirt.cid = '. $cid);
		if(mysqli_num_rows($result) > 0){
			return new tshirts_element(mysqli_fetch_array($result));
		}
		return NULL;	
	}
	public function getUID(&$username) {
 		$sql  = new dbconnection();
		$result = $sql->query('SELECT uid FROM `users` where username like \'' . $username . '\'');
		if(mysqli_num_rows($result) ==  1){
			$tmp = mysqli_fetch_array($result);
			return $tmp['uid'];
		}
		return NULL;	
 	}
 	public function getAddresses(&$UID) {
 		$sql  = new dbconnection();
		$result = $sql->query('SELECT * FROM `Addresses` where `uid` = '. $UID);
		if(mysqli_num_rows($result) > 0){
			return $result;
		}
		return NULL;	
 	}
 	public function addNewAddress(&$country,&$province,&$city,&$street,&$number,&$extra) {
 		if(isset($_SESSION['username'])) {
			$UID = $this->getUID($_SESSION['username']);
		}
 		$sql  = new dbconnection();
 		$result = $sql->query("INSERT INTO `Addresses` (`AID`,`country`,`province`, `city`, `street`, `number`, `extra`, `UID`) VALUES ('NULL','" .$country."','". $province ."','" .$city."','" .$street."','" .$number."','" .$extra."','" .$UID."');");
		if ($result) {
			return $sql->getLastID();
		}
		else {
			return NULL;
		}
 	}
 	public function addOrder(&$AID) {
		if (isset($_COOKIE["trolley"])) {
			$troll = $_COOKIE['trolley'];
			$sql  = new dbconnection();
			$result = $sql->query("INSERT INTO `Orders` (`OID`,`AID`,`Order`,`Status`) VALUES ('NULL','". $AID ."','". $troll ."','0');");
 			return $result;
 		}
 	}
	public function getAuth(&$user,&$pass){
		return new auth_user($user,$pass);
	}
 
	public function getRegis(&$user,&$pass1,&$pass2) {
		return new reg_user($user,$pass1,$pass2);
	}
 
	public function getTshirts(&$number_of_page, &$size){
		return new tshirts($number_of_page,$size,NULL) ;
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

	public function upgradeUser($username){
		$sql  = new dbconnection();
		$result = $sql->query("UPDATE `users` SET manager='1' WHERE username = '$username'");
		return $result;
	}
}
 
?>
