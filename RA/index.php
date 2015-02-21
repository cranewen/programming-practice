<?php
	include("header.php");
	include_once("connection.php");
	include("ra.php");
	
?>

<html>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript">
		function newra(){
			window.location = "createRA.php";
		}
	</script>
	
	
	
		<input type="button" name="newRa" value="NEW" id="new_RA" onclick="newra();"/>
		
		<form method="get" action="report.php">
			<input type="submit" name="reportView" value="Report View" id="report_view"/>
			<input type="text" name="search" id="search" />
			<input type="submit" name="searchSubmit" value="Search" id="search_submit"/>
			<input type="text" name="styleSearch" id="style_search"/>
			<input type="submit" name="styleSearchSubmit" value="Search Style Number"  id="style_search_submit"/>
		</form>
		

</html>