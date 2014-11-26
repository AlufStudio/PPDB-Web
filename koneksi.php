<?php
	$username = "root";
	$password = "";
	$host = "localhost";
	$db = "ppdb";

	$conn = new mysqli($host,$username,$password,$db);

	if($conn->connect_error){
		trigger_error('Database connection failed: '  . mysqli_connect_error(), E_USER_ERROR);
	}
?>