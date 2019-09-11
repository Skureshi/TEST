<?php  
	
	spl_autoload_register(function ($class) {
		include 'Model/' . $class . 'Model.php';
	});

	$db = new DB();
	$departments = new Department($db);
	$allDepartments = $departments->select(); 

	include("View/home.php");

?>