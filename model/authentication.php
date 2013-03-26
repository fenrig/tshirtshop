<?php
include_once("includes/sql.php");

class auth_user{
	private $sql;
	private $auth;

	public function __construct($user,$pass){
		$this->sql  = new dbconnection();
		$this->auth = FALSE; 
		$this->authenticate($user,$pass);
	}

	public function authenticate($user,$pass){
		$result = $this->sql->query("SELECT * FROM users WHERE username='" . $user . "' and password='" . md5($pass) . "'");
		$this->auth = (mysqli_num_rows($result) == 1);
		return $this->auth;
	}

	public function isAuthenticated(){
		return $this->auth;
	}
}

?>