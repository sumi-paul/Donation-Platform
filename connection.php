<?php

	$servername = "localhost";
	$username = "sumi_paul";
	$password = "2hin@bc0646576";
	$dbname = "carecycle";

	// Correct the function to mysqli_connect
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check the connection
	if($conn){
		echo "Connected successfully";
	}
	else{
		die("Connection failed because: " . mysqli_connect_error());
	}

?>
