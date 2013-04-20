<?php

include_once("includes/sql.php");

class tshirts_element implements arrayaccess{
	private $tshirt_element;

	public function __construct($element){
		$this->tshirt_element = $element;
	}

	public function offsetGet($offset){
		switch($offset){
			case "tid":
				return $this->tshirt_element[0];
			case "cid":
				return $this->tshirt_element[1];
#			case "size":
#				return $this->tshirt_element[2];
			case "format":
				return $this->tshirt_element[2];
			case "sleeves":
				return $this->tshirt_element[3];
			case "price":
				return $this->tshirt_element[5];
			case "color":
				return $this->tshirt_element[6];
			case "brand":
				return $this->tshirt_element[7];
			case "agegroup":
				return $this->tshirt_element[8];
			case "sex":
				return $this->tshirt_element[9];
			case "fabric":
				return $this->tshirt_element[10];
			case "description":
				return $this->tshirt_element[11];
			default:
				return False;
		}
	}

	public function offsetExists($offset){
		return False;
	}

	public function offsetSet($offset, $value){
		return;
	}

	public function offsetUnset($offset){
		return;
	}
}

class tshirts implements arrayaccess, Iterator{
	// TODO: add foreach functionality
	// http://stackoverflow.com/questions/9973080/using-foreach-over-an-object-implementing-arrayaccess-and-iterator

	private $elements;
	private $no_elements;
	private $sql;
	// ---------------------
	private $pointer = 0;
	
	public function rewind(){
		$this->pointer = 0;
	}

	public function current(){
		return $this->elements[$this->pointer];
	}

	public function key(){
		return $this->pointer;
	}

	public function next(){
		++$this->pointer;
	}

	public function valid(){
		return isset($this->elements[$this->pointer]);
	}
	// ---------------------
	public function __construct($number_of_page = NULL, $size = NULL, $sql_result = NULL){
		if($number_of_page == NULL){
			$lower = $number_of_page * $size;
			$upper = (($number_of_page + 1) * $size) - 1;
			$this->elements = array();
			$this->tid = NULL;
			$this->sql = new dbconnection();
			$result = $this->sql->query('SELECT * FROM `tshirt` INNER JOIN `clothings` ON tshirt.cid = clothings.cid LIMIT ' . $lower . ',' . $upper);
			parse_sql_result($result);
		}else{
			parse_sql_result($sql_result);
		}
	}

	public function parse_sql_result(&$result){
		if($result == False){
			$this->no_elements = 0;
		}else{
			$this->no_elements = mysqli_num_rows($result);
			while($row = mysqli_fetch_array($result)){
				$element = new tshirts_element($row);
				array_push($this->elements, $element);
			}
		}
	}

	public function length(){
		return $this->no_elements;
	}

	public function offsetGet($offset){
		if($offset > -1 && $offset < $this->no_elements)
			return $this->elements[$offset];
		else
			return False;
	}

	public function offsetExists($offset){
		return isset($this->elements[$offset]);
	}

	public function offsetSet($offset, $value){
		return;
	}

	public function offsetUnset($offset){
		unset($this->container[$offset]);
	}
}

?>