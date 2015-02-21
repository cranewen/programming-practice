<?php
	include("header.php");
	?>

<html>
	<link rel="stylesheet" type="text/css" href="style.css">
	<form method="post" action="addingproducts.php">
		<input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>"/>
		<table class="ra_table">
			<tr>
				<td>Date RA Given</td>
				<td><input type="date" name="dateRaGiven" id="date_RA_Given"/></td>
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
				<td><input type="text" name="customerNumber" id="customer_number"/>	
				</td>
			</tr>
			<tr>
				<td>Customer</td>
				<td><input type="text" name="customer" id="customer"/></td>
			</tr>
			<tr>
				<td>Third Party</td>
				<td><input type="text" name="thirdParty" id="third_party"/></td>
			</tr>
			<tr>
				<td>Contact</td>
				<td><input type="text" name="contact" id="contact"/></td>
			</tr>
			<tr>
				<td>Date RA Arrived</td>
				<td><input type="date" name="dateRaArrived" id="date_ra_arrived"/></td>
			</tr>
			<tr>
				<td>With Order Number</td>
				<td><input type="text" name="withOrderNumber" id="with_order_number"/></td>
			</tr>
			<tr>
				<td>From Invoice Number</td>
				<td><input type="text" name="fromInvoiceNumber" id="from_invoice_number"/></td>
			</tr>
			<tr>
				<td>Date Sent Out</td>
				<td><input type="date" name="dateSentOut" id="date_sent_out"/></td>
			</tr>
			<tr>
				<td>Date Returned</td>
				<td><input type="date" name="dateReturned" id="date_returned"/></td>
			</tr>
			<tr>
				<td>Repair Cost</td>
				<td><input type="text" name="repairCost" id="repair_cost"/></td>
			</tr>
			<tr>
				<td>Repair Number</td>
				<td><input type="text" name="repairNumber" id="repair_number"/></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><textarea name="description" id="description"></textarea></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="submit"/></td>
			</tr>
		</table>
	</form>


</html>