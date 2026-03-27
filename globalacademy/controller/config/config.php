<?php      
	//==================DB Connection Parameters=============================================================

	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'global_academy_db';

	$link = mysqli_connect($server, $username, $password, $database);

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	$connection = new PDO('mysql:host=localhost;dbname=global_academy_db', $username, $password);

	$defaultUrl = "http://localhost/globalacademy/";
	
	mysqli_set_charset($link, 'utf8');
	//http://localhost:3000/globalacademy $defaultUrl = "http://localhost/globalacademy/";
?>