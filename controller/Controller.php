<?php

include_once("model/Model.php");
include_once("template_engine/template.php");

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
					if(isset($post)){
						$tshirt = $this->model->getTshirt($post);
						include 'view/viewtshirt.php';
					}else{
						$this->notFound();
					}
					break;
				case "login":
					include 'view/login.php';
					break;
				case "auth":
					$this->authenticate();
					break;
				case "register":
					include 'view/Register.php';
					break;
				case "regis":
					$this->register();
					break;
				default:
					$this->notFound();
					break;
			}
		}else{
			global $test;
			$test = "Jeeeeeeeeeej hij kan me globalen werken";
			$view = new template_engine("home");
			echo $view->output();

			//include_once("view/home.php");
		}
	}

	public function authenticate(){
		if(isset($_POST["user"]) && isset($_POST["password"]))
			$credential_model = $this->model->getAuth($_POST["user"],$_POST["password"]);
		if($credential_model->isAuthenticated()){
			session_start();
			$_SESSION["username"] = $_POST["user"];
		}
	}
	
	public function Register() {
		if(isset($_POST["user"]) && isset($_POST["password1"]) && isset($_POST["password2"])) {
			$credential_model = $this->model->getRegis($_POST["user"],$_POST["password1"],$_POST["password2"]);
			if ($credential_model->isRegistered()) {
				if(!isset($_SESSION))
					session_start();
				$_SESSION["username"] = $_POST["user"];
			}
		}
	}

	public function notFound() {
		include_once("view/404.php");
	}
}

?>
