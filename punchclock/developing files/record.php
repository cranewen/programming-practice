<?php
	include("employee.php");
	date_default_timezone_set('America/New_York');
	session_start();
	$name = $_POST['employeeName'];
	$employee = new Employee($name);
	
	$_SESSION[$name] = "employee";
	$con = mysql_connect("localhost","bastian","bastian");
	mysql_select_db("employee punch card");
	if($con){
		echo("Successfully connected database! <br/>");
	}
	
	
	if(isset($_POST['punchin']) && isset($_SESSION[$name])){
		$punchInTime = date('Y-m-d H:i:s');
		$employee->punchInTime = $punchInTime;
		echo $employee->name," has punched in at ",$employee->punchInTime;
		mysql_query("insert into `punch_card` (name, punchInTime) values ('$employee->name', '$employee->punchInTime')");
		mysql_close($con);
		}
		
	

	if(isset($_POST['punchout']) && isset($_SESSION[$name])){
		$punchOutTime = date('Y-m-d H:i:s');
		$employee->punchOutTime = $punchOutTime;
		echo $employee->name," has punched out at ", $employee->punchOutTime;
		echo $employee->duration();
		mysql_query("insert into `punch_card` (name, punchOutTime) values ('$employee->name', '$employee->punchOutTime')");
		mysql_close($con);
		}
	
	$pIn = $employee->punchInTime;
	$pOut = $employee->punchOutTime;
	
	//else echo("#@%!@%$^%");
	echo ("<html><br/></html>");
	echo "session name is ", $_SESSION[$name],"<br/>";
	echo $pIn,"<br/>";
	echo $pOut,"<br/>";
	echo $pIn-$pOut," hours!";
	
?>