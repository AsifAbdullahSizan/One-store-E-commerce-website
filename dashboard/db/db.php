<?php

	$host = "localhost";
	$user = "root";
	$password = "";
	$db_name = "db_one_store";
	$con = mysqli_connect($host,$user,$password,$db_name);

	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>