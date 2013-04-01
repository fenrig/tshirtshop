<?php

include_once("model/clothing.php");

class tshirt extends clothing{
	// eigenschappen
	public $tid;
	public $size;
	public $format;
	public $sleeves;

	public function __construct($tid){
		$this->tid = NULL;
		$this->sql = new dbconnection();
		$result = $this->sql->query("SELECT * FROM tshirt WHERE tid = " . $tid);
		// todo
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_array($result);
			$this->tid = $tid;
			parent::__construct($row[1]);
			$this->size = $row[2];
			$this->format = $row[3];
			$this->sleeves = $row[4];
		}
	}
}

// TODO: ADD database entries, test tshirt class

?>