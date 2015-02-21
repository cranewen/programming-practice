<?php
	include("employee.php");
	require("connection.php");
	
	$connection = new Connection("localhost","bastian","bastian","employee punch card");
	/* need to work on that
$startTime = $_POST['startTime'];
	$endTime = $_POST['endTime'];	
	if(!isset($_POST['startTime'])){
		
	}
*/
// click on 'manager' button to get the list of punchin/punchout data of all employees.
	if(isset($_POST['manager'])){
		$query = "select name,punchInTime,punchOutTime from `punch_card` order by name";
		$result = mysqli_query($connection->con,$query);
		 	 echo "<table>";
		 	 echo "<tr>";
		 	 echo "<th>","<font color='blue'>Name</font>","</th>";
		 	 echo "<th>","<font color='blue'>Punch In Time</font>","</th>";
		 	 echo "<th>","<font color='blue'>Punch Out Time</font>","</th>";
		 	 //echo "<th>","<font color='blue'>Total of the day</font>","</th>";
		 	 echo "</tr>";
		 	
		while($row = mysqli_fetch_array($result)){
		 	 echo "<tr>";
		 	 echo "<th>" . $row['name'] . "</th>";
		 	 if($row['punchInTime']=="0000-00-00 00:00:00"){
				 echo "<th></th>";
			  }else{
			  	 echo "<th>" . $row['punchInTime'] . "</th>";
			  		}
			 if($row['punchOutTime']=="0000-00-00 00:00:00"){
				 echo "<th></th>";
			 } else{
				 echo  "<th>" . $row['punchOutTime'] . "</th>";
			 }
  		}
  		echo "</table>";
		mysqli_close($connection->con);
	}

// click on 'look up notes' buton to get the data of all notes.
	if(isset($_POST['listNotes'])){
		$query = "select name,notes,date from `notes` order by date";
		$result = mysqli_query($connection->con,$query);
		 	 echo "<table>";
		 	 echo "<tr>";
		 	 echo "<th>","<font color='blue'>Name</font>","</th>";
		 	 echo "<th width='200'>","<font color='blue'>Notes</font>","</th>";
		 	 echo "<th>","<font color='blue'>Date</font>","</th>";
		 	 //echo "<th>","<font color='blue'>Total of the day</font>","</th>";
		 	 echo "</tr>";
		 	
		while($row = mysqli_fetch_array($result)){
		 	 echo "<tr>";
		 	 echo "<th>" . $row['name'] . "</th>";
		 	 echo "<th width='200'>" . $row['notes'] . "</th>";
		 	 echo "<th>" . $row['date'] . "</th>";;
		 	 echo "</tr>";
		 	   		}
  		echo "</table>";
		mysqli_close($connection->con);
	}

/*
	if(isset($_POST['delete'])){
		$query = "delete from `punch_card`";
		mysqli_query($connection->con,$query);
		mysqli_close($connection->con);		
	}
*/
	
		if(isset($_POST['cal_crane']) && isset($_POST['startTime']) && isset($_POST['endTime'])){
	
// *Method1* Finding the last element of punchin array, then punchout subtract punchin, get the total of the day of time period.
		/*
$query_punchIn = "select punchInTime from `punch_card` where name='Crane'";
		$result_punchIn = mysqli_query($connection->con,$query_punchIn);
		$sumOfTime = 0;
		
		$punchInArray = array();
		while($row = mysqli_fetch_array($result_punchIn)){ //need to work on this, store data to an array from mysql
			$punchInArray[] = $row;
		}
		echo count($punchInArray);
		echo array_shift(array_slice($punchInArray,0,5));
*/
		
// Timestamp method.
		$startTime = $_POST['startTime'];
		$endTime = $_POST['endTime'];
		$timeDiffQuery = "select sum(UNIX_TIMESTAMP(punchOutTime)-UNIX_TIMESTAMP(punchInTime))/60/60 
		AS totalTime from `punch_card` where (name='Crane' && date>='$startTime' && date<='$endTime')";
		$result = mysqli_query($connection->con,$timeDiffQuery);
		while($row = mysqli_fetch_array($result)){
				echo "Crane's total time of this pay period is ",$row['totalTime']," hours!";
			}
		}
		
		if(isset($_POST['cal_sarah']) && isset($_POST['startTime']) && isset($_POST['endTime'])){
			$startTime = $_POST['startTime'];
			$endTime = $_POST['endTime'];
			$timeDiffQuery = "select sum(UNIX_TIMESTAMP(punchOutTime)-UNIX_TIMESTAMP(punchInTime))/60/60 
			AS totalTime from `punch_card` where (name='Sarah' && date>='$startTime' && date<='$endTime')";
			$result = mysqli_query($connection->con,$timeDiffQuery);
			while($row = mysqli_fetch_array($result)){
				echo "Sarah's total time of this pay period is ",$row['totalTime']," hours!";
			}
		}
		
		if(isset($_POST['cal_amanda']) && isset($_POST['startTime']) && isset($_POST['endTime'])){
			$startTime = $_POST['startTime'];
			$endTime = $_POST['endTime'];
			$timeDiffQuery = "select sum(UNIX_TIMESTAMP(punchOutTime)-UNIX_TIMESTAMP(punchInTime))/60/60 
			AS totalTime from `punch_card` where (name='Amanda' && date>='$startTime' && date<='$endTime')";
			$result = mysqli_query($connection->con,$timeDiffQuery);
			while($row = mysqli_fetch_array($result)){
				echo "Amanda's total time of this pay period is ",$row['totalTime']," hours!";
			}
		}

?>

<html>
	<script type="text/javascript">

		function redirect() {
			window.location = "../punchclock";
			}

	</script>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
	<form method="post" action="manager.php">
	<input type="button" value="Go Back" onclick="redirect();" id="backToMainPage"/>
	<!-- <input type="submit" value="Delete" name="delete" id="deletePreviousData" 
	onclick="return confirm('Are you sure you want to delete the data? ')" /> -->
	<input type="submit" value="Calculate Crane's pay period" name="cal_crane" id="cal_crane"/>
	<input type="submit" value="Calculate Sarah's pay period" name="cal_sarah" id="cal_sarah"/>
	<input type="submit" value="Calculate Amanda's pay period" name="cal_amanda" id="cal_amanda"/>
	<div id="dateText">
		<input type="text" name="startTime" placeholder="Please type in start date!" id="start_time"/>
		<input type="text" name="endTime" placeholder="Please type in end date!" id="end_time"/>
	</div>
	<input type="submit" name="listNotes" value="Look up notes" id="listNotes"/>
	</form>
</html>
