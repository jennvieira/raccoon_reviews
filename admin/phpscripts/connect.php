<?php
	//Set up connection + passing permissions...
	$user = "root";
	//$pass = "";   ... FOR PC
	$pass = "root";
	$url = "localhost";
	$db = "db_movies";

	//PC $link = mysqli_connect($url, $user, $pass, $db);
	$link = mysqli_connect($url, $user, $pass, $db, "8888");

	//Check the connection
	if(mysqli_connect_errno()) {
		printf("Connect Failed: %s\n", mysqli_connect_error());
		exit();
	}


?>
