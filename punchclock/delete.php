<?php
	include("employee.php");
	include("connection.php");
	
	$connection = new Connection("localhost","bastian","bastian","employee punch card");
	
	function isempty($var){
		if(($var=='0000-00-00 00:00:00') || ($var==null)){
			return true;
		}return false;
	}
	
	if(isset($_POST['delete']) && isset($_POST['deleteByPunchIn']) && isset($_POST['employee'])
	&& isempty($_POST['deleteByPunchOut'])){
		$name = $_POST['employee'];
		$punchInTime = $_POST['deleteByPunchIn'];
		$query = "delete from `punch_card` where (name = '$name' && punchInTime = '$punchInTime')";
		mysqli_query($connection->con, $query);
		mysqli_close($connection->con);
		echo "you just delete a row of punchin.";
	}
		
	if(isset($_POST['delete']) && isset($_POST['deleteByPunchOut']) && isset($_POST['employee']) 
	&& isempty($_POST['deleteByPunchIn'])){
		$name = $_POST['employee'];
		$punchOutTime = $_POST['deleteByPunchOut'];
		$query = "delete from `punch_card` where (name = '$name' && punchOutTime = '$punchOutTime')";
		mysqli_query($connection->con, $query);
		mysqli_close($connection->con);
		echo "you just delete a row of punchout.";
	}
	
	if(isset($_POST['deleteNotes']) && isset($_POST['notesDate']) && isset($_POST['employee'])
	  && isempty($_POST['deleteByPunchIn']) && isempty($_POST['deleteByPunchOut'])){
		$name = $_POST['employee'];
		$date = $_POST['notesDate'];
		$query = "delete from `notes` where (name = '$name' && date = '$date')";
		mysqli_query($connection->con, $query);
		mysqli_close($connection->con);
		echo "You just delete a note from database!";
	}

?>

<html>
	<script type="text/javascript">

		function redirect() {
			window.location = "../punchclock";
			}

	</script>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
	<form method="post" action="delete.php">
		<input type="button" value="Go Back" onclick="redirect();" id="backToMainPage"/>
		<input type="text" name="employee" id="employee" placeholder="type in employee's name"/>
		<input type="text" name="deleteByPunchIn" id="delete_by_punch_in" placeholder="type in punch in time!"/>
		<input type="text" name="deleteByPunchOut" id="delete_by_punch_out" placeholder="type in punch out time!"/>
		<input type="text" name="notesDate" id="notesDate" placeholder="type in date here!"/>
		<input type="submit" value="Delete" name="delete" id="deletePreviousData" 
		onclick="return confirm('Are you sure you want to delete the data? ')"/>
		<input type="submit" name="deleteNotes" value="Delete Notes" id="deleteNotes"/>
	</form>
</html>