<?php
include_once("includes/sql.php");

class auth_user{
	private $sql;
	private $auth;
	private $storeManager;

	public function __construct($user,$pass){
		$this->sql  = new dbconnection();
		$this->auth = FALSE; 
		$this->storeManager = FALSE;
		$this->authenticate($user,$pass);
	}

	public function authenticate($user,$pass){
		include_once("includes/Salt.php");
		$user = mysql_real_escape_string($user);
		$pass = mysql_real_escape_string($pass);

		foreach ($salt as &$value) {	
				
			$result = $this->sql->query("SELECT * FROM users WHERE username='" . $user . "' and password='" . md5($value.$pass) ."';");
			if($result === False) continue;
			if(mysqli_num_rows($result) == 1) {
				$this->auth = TRUE;
				$user = mysqli_fetch_row($result);
				if($user[3] > 0) $this->storeManager = TRUE;
				break;		
			}
		}
		return $this->auth;
	}

	public function isAuthenticated(){
		return $this->auth;
	}

	public function isStoreManager(){
		return $this->storeManager;
	}
}

?>
