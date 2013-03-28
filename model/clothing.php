<?php

include_once("includes/sql.php");

// http://cs.nyu.edu/courses/fall02/V22.0380-001/color_theory.htm

class clothing{
	private $sql;

	public $cid;
	public $price;
	public $color; // algemene kleur
	public $brand;
	public $agegroup;
	public $sex;
	public $fabric;
	public $description;
	
	public function __construct($cid){
		if(empty($this->sql))
			$this->sql = new dbconnection();
		$result = $this->sql->query("SELECT * FROM clothings WHERE cid = " . $cid );
		if(mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_array($result);
			$this->cid = $cid;
			$this->price = $row[1];
			$this->color = $row[2];
			$this->brand = $row[3];
			$this->agegroup = $row[4];
			$this->sex = $row[5];
			$this->fabric = $row[6];
			$this->description = $row[7];
		}
	}
}

?>