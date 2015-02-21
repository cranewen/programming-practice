<?php
	include("employee.php");
	require("connection.php");
	$crane = new Employee("Crane");
	$sarah = new Employee("Sarah");
	$amanda = new Employee("Amanda");
	$employee = array($crane,$sarah,$amanda);
	
class Calculator{
	
	public function calculateDayWorkPeriod(){
		$connection = new Connection("localhost","bastian","bastian","employee punch card");
		$query = "select name,punchInTime,punchOutTime from `punch_card` where name = 'Crane'";
		$result = mysqli_query($connection->con,$query);
		$row = mysqli_fetch_array($result);
		$duration = $crane->punchOut() - $row[mysql_fetch_lengths($result)-1];
		echo($duration);
	}
	
	public function test(){
		$query = "select name,punchInTime,punchOutTime from `punch_card` where name = 'Crane'";
		$result = mysqli_query($connection->con,$query);
		while($row = mysqli_fetch_array($result)){
			echo $row[0],$row[1],$row[2];
		}
	}
	
}

	$cal = new Calculator();
	$cal->calculateDayWorkPeriod();
?>