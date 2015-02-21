<?php

class Connection{
	public $host;
	public $user;
	public $password;
	public $database;
	public $con;
	
	
	public function __construct($host,$user,$password,$database){
		$this->host = $host;
		$this->user = $user;
		$this->password = $password;
		$this->database = $database;
		$this->con = mysqli_connect($host,$user,$password,$database);
		if(!$this->con){
		die("Cannot connect the database: ".mysqli_error($con));
	}
	echo "<font size='10' color='green'><center><b>Bastian employee punch clock system!</b></center></font><br/>"; /* Actually, this is a 			connection successed message!*/
	
	}

}
?>