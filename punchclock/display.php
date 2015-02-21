<?php
	include("employee.php");
	//require("connectdb.php");
	require("connection.php");
	//date_default_timezone_set('America/New_York');
	session_start();
	$name = $_POST['employeeName'];
	
	$employee = new Employee($name);
	
	$connection = new Connection("localhost","bastian","bastian","employee punch card");
	$today = date('Y-m-d');
	
	function checkPunchInStatus(){
		$query = 'SELECT punchInTime,punchOutTime,date FROM `punch_card` WHERE name="$name" ORDER BY date DESC LIMIT 1';
		$result = mysqli_query($connection->con,$query);
		$rows = mysqli_fetch_array($result);
		if(($rows['date']==$today) && ($rows['punchInTime']!=null) &&($rows['punchOutTime']==null)){
			return true;
		}else{
			return false;
		}
	}
	
	if(isset($_POST['punchin']) && (checkPunchInStatus()==false)){
		$punchInTime = $employee->punchIn();
		mysqli_query($connection->con, "insert into `punch_card` (name, punchInTime, date) values ('$employee->name', '$punchInTime', 		'$punchInTime')");
		mysqli_close($connection->con);
	}else{
		echo "You didn't punch in, please punch in";
		header("Location:/punchclock");
	}
	if(isset($_POST['punchout']) && (checkPunchInStatus()==true)){
		$punchOutTime = $employee->punchOut();
		mysqli_query($connection->con, "insert into `punch_card` (name, punchOutTime, date) values ('$employee->name', '$punchOutTime', 		'$punchOutTime')");
		mysqli_close($connection->con);
	}
	
	if(isset($_POST['notes']) && isset($_POST['notesTextArea'])){
		$date = date('Y-m-d');
		$notes = $_POST['notesTextArea'];
		$query = "insert into `notes` values ('$employee->name', '$notes', '$date')";
		mysqli_query($connection->con,$query);
		mysqli_close($connection->con);
		echo "$employee->name",", you have just took a note at: ","$date";
	}
?>

<html>
	<script type="text/javascript">

		function redirect() {
			window.location = "../punchclock";
			}

	</script>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
	<form method="post" action="display.php">
	<input type="button" value="Go Back" onclick="redirect();" id="backToMainPage"/>
	</form>
</html>
