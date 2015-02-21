<?php
	include("header.php");
	include("connection.php");
	include("ra.php");
	
	$connection = new Connection("localhost","bastian","bastian","ralog");
	
	$selectMaxIndexOfCurrentRa = mysqli_query($connection->con,"SELECT MAX(ra_number) from `ra_logs` ");
	$maxIndexOfCurrentRa = mysqli_fetch_array($selectMaxIndexOfCurrentRa);

	$currentRaSelectQuery = "select * from `ra_logs` where ra_number = $maxIndexOfCurrentRa[0]"; // select the current RA
	$currentRaProductsSelectQuery = "select * from `products` where ra_number = $maxIndexOfCurrentRa[0]"; // the products added in the current RA
	$currentRaSelectQueryResult = mysqli_query($connection->con, $currentRaSelectQuery);
	$currentRaProductsSelectQueryResult = mysqli_query($connection->con, $currentRaProductsSelectQuery);
	
	

	if(isset($_POST['viewThisRa'])){
	echo "You have just created RA: ", $maxIndexOfCurrentRa[0],".";
	echo "<table>";
		 	 echo "<tr>";
		 	 echo "<th>","<font color='blue'>RA Number</font>","</th>";
		 	 echo "<th>","<font color='blue'>Date RA Given</font>","</th>";
		 	 echo "<th>","<font color='blue'>Jewelry Line</font>","</th>";
		 	 echo "<th>","<font color='blue'>Customer Number</font>","</th>";
		 	 echo "<th>","<font color='blue'>Customer</font>","</th>";
		 	 echo "<th>","<font color='blue'>Third Party</font>","</th>";
		 	 echo "<th>","<font color='blue'>Contact</font>","</th>";
		 	 echo "<th>","<font color='blue'>Date RA Arrived</font>","</th>";
		 	 echo "<th>","<font color='blue'>With Order Number</font>","</th>";
		 	 echo "<th>","<font color='blue'>From Invoice Number</font>","</th>";
		 	 echo "<th>","<font color='blue'>Date Sent Out</font>","</th>";
		 	 echo "<th>","<font color='blue'>Date Returned</font>","</th>";
		 	 echo "<th>","<font color='blue'>Repair Cost</font>","</th>";
		 	 echo "<th>","<font color='blue'>Repair Number</font>","</th>";
		 	 echo "<th>","<font color='blue'>Description</font>","</th>";
		 	 echo "</tr>";
		while($row = mysqli_fetch_array($currentRaSelectQueryResult)){
			 echo "<tr>";
		 	 echo "<th>",$row['ra_number'],"</th>";
		 	 echo "<th>",$row['date_ra_given'],"</th>";
		 	 echo "<th>",$row['jewelry_line'],"</th>";
		 	 echo "<th>",$row['customer_number'],"</th>";
		 	 echo "<th>",$row['customer'],"</th>";
		 	 echo "<th>",$row['third_party'],"</th>";
		 	 echo "<th>",$row['contact'],"</th>";
		 	 echo "<th>",$row['date_ra_arrived'],"</th>";
		 	 echo "<th>",$row['with_order_number'],"</th>";
		 	 echo "<th>",$row['from_invoice_number'],"</th>";
		 	 echo "<th>",$row['date_sent_out'],"</th>";
		 	 echo "<th>",$row['date_returned'],"</th>";
		 	 echo "<th>",$row['repair_cost'],"</th>";
		 	 echo "<th>",$row['repair_number'],"</th>";
		 	 echo "<th>",$row['description'],"</th>";
		 	 echo "</tr>";

		}
			 echo "<tr>";
			 echo "<th></th>";
		 	 echo "<th>","<font color='green'>Style Number</font>","</th>";
		 	 echo "<th>","<font color='green'>Quantity</font>","</th>";
		 	 echo "<th>","<font color='green'>Repair Number</font>","</th>";
		 	 echo "<th>","<font color='green'>Description</font>","</th>";
			 echo "</tr>";
		while($row = mysqli_fetch_array($currentRaProductsSelectQueryResult)){
			 echo "<tr>";
			 echo "<th></th>";
		 	 echo "<th>",$row['style_number'],"</th>";
		 	 echo "<th>",$row['quantity'],"</th>";
		 	 echo "<th>",$row['repair_number'],"</th>";
		 	 echo "<th>",$row['description'],"</th>";
			 echo "</tr>";
		}
		
	echo "</table>";
	
	}
?>