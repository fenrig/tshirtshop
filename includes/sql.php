<?php

class dbconnection{
	private $connection;

	public function __construct(){
		$this->connection = mysqli_connect("localhost","root","","teeshirt",8081);
		if (mysqli_connect_errno($this->connection)){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	}

	public function __destruct(){
		mysqli_close($this->connection);
	}

	public function query($sql_command){
		return mysqli_query($this->connection,$sql_command);
	}

}

?>