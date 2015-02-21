<?php

	$host = "localhost";
	$user = "bastian";
	$password = "bastian";
	$database = "employee punch card";
	
	$con = mysqli_connect($host,$user,$password,$database);
	
	
	if(!$con){
		die("Cannot connect the database: ".mysqli_error($con));
	}
	echo "<font size='10' color='green'><center><b>Bastian employee punch clock system!</b></center></font><br/>"; /* Actually, this is a 			connection successed message!*/
	//mysql_close($con);

?>