include_once("model/tshirt.php")

class Model{
	public function getTshirt(){
		$returnvalue = new tshirt("tshirtname");
		return $returnvalue;
	}
}