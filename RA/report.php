<?php
	include("header.php");
?>
<html>
	<script type="text/javascript">
		var editinput = document.getElementById('edit_input').value;
		var deleteinput = document.getElementById('delete_input').value;
		function confirmEdit(){
			if(editinput!=""){
				return confirm("Are you sure you want to edit RA: " + document.getElementById('edit_input').value);
			}
		}
		function confirmDelete(){
			if(deleteinput!=""){
				return confirm("Are you sure you want to delete RA: " + document.getElementById('delete_input').value);
			}
		}
		
	</script>
	<form method="get" action="modify.php" onsubmit="return confirmEdit();">
		<input type="text" name="editInput" id="edit_input"/>
		<input type="submit" name="edit" value="Edit" id="edit"/>
	</form>
	<form method="get" action="finishediting.php" onsubmit="return confirmDelete();">
		<input type="text" name="deleteInput" id="delete_input"/>
		<input type="submit" name="delete" value="Delete" id="delete"/>
	</form>
	<input type="button" value="print" onclick="window.print();" />
</html>

<?php
	include_once("connection.php");
	include("ra.php");
	include("products.php");
	

	$ra = new Ralog();
	$ra->setRaNumber($_GET['search']);
	$ra->setCustomerNumber($_GET['search']);
	$ra->setCustomer($_GET['search']);
	$ra->setThirdParty($_GET['search']);
	$ra->setWithOrderNumber($_GET['search']);
	$ra->setFromInvoiceNumber($_GET['search']);
	$ra->setRepairNumber($_GET['search']);
	$selectResult = $ra->selectAll();
	
	
	if(isset($_GET['reportView'])){
		echo "<table>";
		 	 echo "<tr>";
		 	 echo '<th width="5%"><font color="blue">RA Number</font></th>';
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
		 	 
		 	 while($row = mysqli_fetch_array($selectResult)){
			 echo "<tr>";
		 	 echo '<th><a href="singlerarecord.php?ra=' .$row['ra_number'].'">', $row['ra_number'],'</a></th>';
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
		 	 
		 echo "</table>";
	}
	
	if(isset($_GET['search']) && isset($_GET['searchSubmit'])){
		$connection = new ConnectBastianDB();
		$searchResult = mysqli_query($connection->connectBastian(), $ra->searchRa());
		echo "<table>";
		echo "<tr>";
		 	 echo '<th width="5%"><font color="blue">RA Number</font></th>';
		 	 echo "<th width='10%'>","<font color='blue'>Date RA Given</font>","</th>";
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
		 	 
		 	 while($row = mysqli_fetch_array($searchResult)){
			 echo "<tr>";
		 	 echo '<th><a href="singlerarecord.php?ra=' .$row['ra_number'].'">', $row['ra_number'],'</a></th>';
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
		echo "</table>";
	}
	
	$products = new Products();
	if(isset($_GET['styleSearch']) && isset($_GET['styleSearchSubmit'])){
		
		$products->setStyleNumber($_GET['styleSearch']);
		$searchStyleNumberResult = $products->searchThroughStyleNumber();
		echo "<table>";
		echo "<tr>";
		 	 echo '<th width="5%"><font color="blue">RA Number</font></th>';
		 	 echo "<th width='10%'>","<font color='blue'>Date RA Given</font>","</th>";
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
		 	 
		 	 while($row = mysqli_fetch_array($searchStyleNumberResult)){
			 echo "<tr>";
		 	 echo '<th><a href="singlerarecord.php?ra=' .$row['ra_number'].'">', $row['ra_number'],'</a></th>';
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
		echo "</table>";
	}
	
?>

