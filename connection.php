<?php

	$servername = "localhost";
	$username = "sumi_paul";
	$password = "2hin@bc0646576";
	$dbname = "carecycle";

	$conn = carecyle_connect($servername, $username, $password, $dbname);

	if($conn){
		echo "";
	}
	else{
		die("Connection failed because ".carecyle_connect_error());
	}

?>