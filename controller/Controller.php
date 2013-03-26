<?php

include_once("model/Model.php");

/*
// -------------
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTP"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
// --------------

echo curPageURL();
*/


class Controller{
	public $model;

	public function __construct(){
		$this->model = new Model();
	}

	public function invoke(){
		// ADDRESS RESOLUTION
		$uri = explode('/', $_SERVER['REQUEST_URI']);
		if(sizeof($uri) > 1 && !empty($uri[1])){
			$page = $uri[1];
		}
		if(sizeof($uri) > 2 && !empty($uri[2])){
			$post = $uri[2];
		}
		// END ADDRESS RESOLUTION
		if(isset($page)){
			switch($page){
				case "tshirt":
					$tshirt = $this->model->getTshirt($page);
					include 'view/viewtshirt.php';
					break;
				case "login":
					include 'view/login.php';
					break;
			}
		}
	}

	public function authenticate(){
		if(isset($_POST["user"]) && isset($_POST["password"]))
			$credential_model = $this->model->getAuth($_POST["user"],$_POST["password"]);
	}
}

?>