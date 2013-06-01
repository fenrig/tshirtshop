<?php
include_once("includes/sql.php");

class reg_user{
	private $sql;
	private $reg;
	
	public function __construct($user,$pass1,$pass2){		
		$this->sql  = new dbconnection();
		$this->reg = FALSE; 
		$this->register($user,$pass1,$pass2);
	}

	public function register($user,$pass1,$pass2){	
		if (strcmp($pass1,$pass2) == 0 ) {
			include_once("includes/Salt.php");
			$result = $this->sql->query("INSERT INTO `users` (`uid`,`username`, `password`, `manager`) VALUES ('NULL','" .$user."','".md5($salt[rand(0, 2)].$pass1)."', '0');");
			$this->reg = $result;	
			return $this->reg;
		}
	}

	public function isRegistered(){
		return $this->reg;
	}
}

?>
