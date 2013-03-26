<?php

include_once("controller/Controller.php");

session_start();
if(isset($_SESSION["username"]))
	echo $_SESSION["username"];

$controller = new Controller();
$controller->invoke();



?>
