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
	private $model;
	private $view;

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
		$this->view = new template_engine();
		if(isset($page)){
			switch($page){
				case "tshirt":
					if(isset($post)){
						global $tshirt;
						$tshirt = $this->model->getTshirt($post);
						if(! $tshirt->tid == NULL)
							$this->view->page("viewtshirt");
						else
							$this->notFound();
					}else{
						$this->notFound();
					}
					break;
				case "login":
					$this->view->page("login");
					break;
				case "auth":
					$this->authenticate();
					break;
				case "register":
					$this->view->page("Register");
					break;
				case "regis":
					$this->register();
					break;
				default:
					$this->notFound();
					break;
			}
		}else{
			$this->view->page("home");
		}
		echo $this->view->output();
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
		$this->view->page("404");
	}
}

?>
