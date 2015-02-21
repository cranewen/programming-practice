<?php
	include("header.php");
	//include_once("connection.php");
	include("ra.php");
	$ralog = new Ralog();

	$connection = new ConnectBastianDB();
	
	if(isset($_GET['editInput']) && isset($_GET['edit'])){
		$editRaNumber = $_GET['editInput'];
		$selectQuery = "SELECT * FROM `ra_logs` where ra_number = '$editRaNumber'";
		$selectQueryResult = mysqli_query($connection->connectBastian(), $selectQuery);
		$row = mysqli_fetch_array($selectQueryResult);
		
		$ralog->setDateRaGiven($row['date_ra_given']);
		$ralog->setJewelryLine($row['jewelry_line']);
		$ralog->setThirdPartY($row['third_party']);
		$ralog->setCustomerNumber($row['customer_number']);
		$ralog->setContact($row['contact']);
		$ralog->setCustomer($row['customer']);
		$ralog->setDateRaArrived($row['date_ra_arrived']);
		$ralog->setWithOrderNumber($row['with_order_number']);
		$ralog->setFromInvoiceNumber($row['from_invoice_number']);
		$ralog->setDateSentOut($row['date_sent_out']);
		$ralog->setDateReturned($row['date_returned']);
		$ralog->setRepairCost($row['repair_cost']);
		$ralog->setRepairNumber($row['repair_number']);
		$ralog->setDescription($row['description']);
		
		$dateRaGiven = $ralog->getDateRaGiven();
		$jewelryLine = $ralog->getJewelryLine();
		$thirdParty = $ralog->getThirdParty();
		$customerNumber = $ralog->getCustomerNumber();
		$contact = $ralog->getContact();
		$customer = $ralog->getCustomer();
		$dateRaArrived = $ralog->getDateRaArrived();
		$withOrderNumber = $ralog->getWithOrderNumber();
		$fromInvoiceNumber = $ralog->getFromInvoiceNumber();
		$dateSentOut = $ralog->getDateSentOut();
		$dateReturned = $ralog->getDateReturned();
		$repairCost = $ralog->getRepairCost();
		$repairNumber = $ralog->getRepairNumber();
		$description = $ralog->getDescription();
		
	}
?>

<html>
<link rel="stylesheet" type="text/css" href="style.css">
	<form method="post" action="finishediting.php">
		<input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>"/>
		<input type="hidden" name="ra_number" value="<?php echo $editRaNumber;?>"/>
		<table class="ra_table">
			<tr>
				<td>Date RA Given</td>
				<td><input type="date" name="dateRaGiven" id="date_RA_Given" 
				value="<?php echo date("Y-m-d",strtotime($dateRaGiven));?>"/></td>
			</tr>
			<tr>
			<td>Jewelry Line</td>
			<td><select id="jewelry_line" name="jewelryLine">
				<option value="bastian"> Bastian </option>
				<option value="jorge"> Jorge </option>
			</select>
			</td>
			</tr>
			<tr>
				<td>Customer Number</td>
				<td><input type="text" name="customerNumber" id="customer_number" value="<?php echo $customerNumber;?>"/>	
				</td>
			</tr>
			<tr>
				<td>Customer</td>
				<td><input type="text" name="customer" id="customer" value="<?php echo $customer;?> "/></td>
			</tr>
			<tr>
				<td>Third Party</td>
				<td><input type="text" name="thirdParty" id="third_party" value="<?php echo $thirdParty;?>"/></td>
			</tr>
			<tr>
				<td>Contact</td>
				<td><input type="text" name="contact" id="contact" value="<?php echo $contact;?>"/></td>
			</tr>
			<tr>
				<td>Date RA Arrived</td>
				<td><input type="date" name="dateRaArrived" id="date_ra_arrived" 
				value="<?php echo date("Y-m-d", strtotime($dateRaArrived));?>"/></td>
			</tr>
			<tr>
				<td>With Order Number</td>
				<td><input type="text" name="withOrderNumber" id="with_order_number" value="<?php echo $withOrderNumber;?>"/></td>
			</tr>
			<tr>
				<td>From Invoice Number</td>
				<td><input type="text" name="fromInvoiceNumber" id="from_invoice_number" value="<?php echo $fromInvoiceNumber;?>"/></td>
			</tr>
			<tr>
				<td>Date Sent Out</td>
				<td><input type="date" name="dateSentOut" id="date_sent_out" 
				value="<?php echo date("Y-m-d", strtotime($dateSentOut));?>"/></td>
			</tr>
			<tr>
				<td>Date Returned</td>
				<td><input type="date" name="dateReturned" id="date_returned" 
				value="<?php echo date("Y-m-d", strtotime($dateReturned));?>"/></td>
			</tr>
			<tr>
				<td>Repair Cost</td>
				<td><input type="text" name="repairCost" id="repair_cost" value="<?php echo $repairCost;?>"/></td>
			</tr>
			<tr>
				<td>Repair Number</td>
				<td><input type="text" name="repairNumber" id="repair_number" value="<?php echo $repairNumber;?>"/></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><textarea name="description" id="description" value="<?php echo $description;?>"><?php echo $description;?></textarea></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="submit" name="update" value="Update"/></td>
			</tr>
		</table>
	</form>
</html>

