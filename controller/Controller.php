<?php

include_once("model/Model.php");
include_once("template_engine/template.php");
include_once("resources/resource_loader.php");

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

if(session_id() == '') session_start();

class Controller{
	private $model;
	private $view;

	public function __construct(){
		$this->model = new Model();
		$this->view = new template_engine();
	}

	public function invoke(){
		// ADDRESS RESOLUTION
		$uri = explode('/', $_SERVER['REQUEST_URI']);
		if(sizeof($uri) > 1 && !empty($uri[1])){
			$page = $uri[1];
		}
		if(sizeof($uri) > 2 /* && !empty($uri[2]) */){
			$post = $uri[2];
		}
		// END ADDRESS RESOLUTION
		if(isset($page)){
			switch($page){
				case "tshirt":
					if(isset($post)){
						global $tshirt;
						$tshirt = $this->model->getTshirt($post);
						if(! $tshirt == NULL)
							$this->view->page('viewtshirt');
						else
							$this->notFound();
					}else{
						$this->notFound();
					}
					break;
				case "login":
					$this->view->page('login');
					break;
				case "checkout":
					$this->view->page('checkout');
					break;
				case "logout":
					$this->logout();
				case "auth":
					$this->authenticate();
					break;
				case "register":
					$this->view->page('Register');
					break;
				case "regis":
					$this->register();
					break;
				case "tshirts":
					global $tshirts;
					global $count;
					$size = 21;
					if(isset($post)){
						$pageno = intval($post);
						$pageno--;
					}else{
						$pageno = 0;
					}
					$tshirts = $this->model->getTshirts($pageno,$size);
					if($tshirts->length() > 0)
						$this->view->page('viewtshirts');
					else
						$this->view->page('404');
					break;
				case "search":
					if( count($_GET) != 0){
						$general_term = NULL;
						if(isset($_GET["q"])){
							$general_term = $_GET["q"];
						}
						$colors = NULL;
						if(isset($_GET["colors"])){
							$colors = $_GET["colors"];
						}
						$brands = NULL;
						if(isset($_GET["brands"])){
							$brands = $_GET["brands"];
						}
						$fabrics = NULL;
						if(isset($_GET["fabrics"])){
							$fabrics = $_GET["fabrics"];
						}
						$agegroup = NULL;
						if(isset($_GET["age"])){
							if($_GET["age"] != "None"){
								$agegroup = $_GET["age"];
							}
						}
						$sex = NULL;
						if(isset($_GET["sex"])){
							if($_GET["sex"] != "None"){
								$sex = $_GET["sex"];
							}
						}
						global $tshirts;
						$tshirts = $this->model->getSearch($general_term,$colors,$brands,$fabrics,$agegroup,$sex);
						$this->view->page('searchresult');
					}else{
						$this->view->page('search');
					}
					
					break;
				case "thumbn":
					if(isset($post)){
						thumbnail($post);
					}else{
						$this->notFound();
					}
					break;
				case "fulln":
					if(isset($post)){
						fullnail($post);
					}else{
						$this->notFound();
					}
					break;
				case "css":
					if(isset($post)){
						getcss($post);
					}else{
						$this->notFound();
					}
					break;
				case "misc":
					if(isset($post)){
						getmisc($post);
					}else{
						$this->notFound();
					}
					break;
				default:
					$this->notFound();
					break;
			}
		}else{
			$this->view->page('home');
		}
		echo $this->view->output();
	}

	public function authenticate(){
		if(isset($_POST["user"]) && isset($_POST["password"]))
			$credential_model = $this->model->getAuth($_POST["user"],$_POST["password"]);
			echo $credential_model->isAuthenticated();
		if($credential_model->isAuthenticated()){
			session_start();
			$_SESSION["username"] = $_POST["user"];
			$this->PageReturn();
		}else{
			//$this->PageReturn();
		}
	}
	
	public function Register() {
		if(isset($_POST["user"]) && isset($_POST["password1"]) && isset($_POST["password2"])) {
			$credential_model = $this->model->getRegis($_POST["user"],$_POST["password1"],$_POST["password2"]);
			if ($credential_model->isRegistered()) {
				if(!isset($_SESSION))
					session_start();
				$_SESSION["username"] = $_POST["user"];
				$this->PageReturn();
			}
		}
	}

	public function notFound() {
		$this->view->page("404");
	}

	public function PageReturn() {
		if (isset($_COOKIE["ReturnPage"])) {
			header("Location: ".$_COOKIE["ReturnPage"]);
			setcookie("ReturnPage","",time() -3600);
		}
		else {
			header("Location: http://localhost:8081/");
		}
	}

	public function logout(){
		session_destroy();
		$this->PageReturn();
	}
}

?>
