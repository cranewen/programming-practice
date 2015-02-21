<?php
	
	session_start();
	require("connection.php");
	$connection = new Connection("localhost","bastian","bastian","employee punch card");
	
?>

<html>
	<script type="text/javascript">
		function checkName(){
			var name = document.getElementById("employee_name").value;
			if(name==""){
				alert("Please select your name!");
				//window.stop();
				return false;
			}
		}
	</script> 
	<div class="container">
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
	<form id="punchclock" method="post" action="display.php" onsubmit="return checkName()">
		<select name="employeeName" form="punchclock" id="employee_name">
			<option style="text-align: center" value="">Select your name</option>
			<option style="text-align: center;" value="Crane"> Crane </option> 
			<option style="text-align: center" value="Sarah"> Sarah </option>
			<option style="text-align: center" value="Amanda"> Amanda </option>
		</select>
		<input type="submit" name="punchin" value="punch in" id="punchin_button"/>
		<input type="submit" name="punchout" value="punch out" id="punchout_button"/>
		<input type="submit" name="notes" value="Take a note" id="notes"/>
		<textarea form="punchclock" name="notesTextArea" id="notesTextArea" placeholder="Please type your notes in this area!"></textarea>
	</form>
	<form method="post" action="manager.php">
		<input type="submit" name="manager" value="manager" id="manage_record"/>
	</form>
	</div>

</html>