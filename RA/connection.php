<?php

class Connection{
	public $host;
	public $username;
	public $password;
	public $database;
	public $con;
	
	public function __construct($host,$username,$password,$database){
		$this->host = $host;
		$this->username = $username;
		$this->password = $password;
		$this->database = $database;
		$this->con = mysqli_connect($host,$username,$password,$database);
		if(!$this->con){
			die("Cannot connect the database: ").mysqli_error($this->con);
		}
		//echo "Successfully connected database!";
		
	}
}

class ConnectBastianDB{
	function connectBastian(){
		$connection = new Connection("localhost","bastian","bastian","ralog");
		return $connection->con;
	}

}


?>