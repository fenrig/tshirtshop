include_once("model/Model.php");

class Controller{
	public $model;

	public function __construct(){
		$this->model = new Model();
	}

	public function invoke(){
		if(isset($_GET['tshirt'])){
			$tshirt = $this->model->getTshirt($_GET['tshirt']);
			include 'view/viewbook.php';
		}
	}
}