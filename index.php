<?php

	session_start();
	
	if(isset($_GET) && isset($_GET["ctrl"]) && isset($_GET["action"])) {
		$ctrl = $_GET["ctrl"];
		$action = $_GET["action"];
	}
	else {
		$ctrl = "Product";
		$action = "home";
	}
	
	require("Controller/".$ctrl."Controller.php");
	$ctrl = $ctrl."Controller";
	$controller = new $ctrl();
	$controller->$action();