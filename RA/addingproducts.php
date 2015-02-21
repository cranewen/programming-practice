<?php
	include("header.php");
	include("ra.php");
	
	session_start();
	$csrf_token = sha1(uniqid(rand(),true));
	$_SESSION['csrf_token'] = $csrf_token;

	$ra = new Ralog();
	
	if(isset($_POST['dateRaGiven'])){
	$ra->setDateRaGiven($_POST['dateRaGiven']);
	}
	if(isset($_POST['jewelryLine'])){
	$ra->setJewelryLine($_POST['jewelryLine']);
	}
	if(isset($_POST['thirdParty'])){
	$ra->setThirdParty($_POST['thirdParty']);
	}
	if(isset($_POST['customerNumber'])){
	$ra->setCustomerNumber($_POST['customerNumber']);
	}
	if(isset($_POST['contact'])){
	$ra->setContact($_POST['contact']);
	}
	if(isset($_POST['customer'])){
	$ra->setCustomer($_POST['customer']);
	}
	if(isset($_POST['dateRaArrived'])){
	$ra->setDateRaArrived($_POST['dateRaArrived']);
	}
	if(isset($_POST['withOrderNumber'])){
	$ra->setWithOrderNumber($_POST['withOrderNumber']);
	}
	if(isset($_POST['fromInvoiceNumber'])){
	$ra->setFromInvoiceNumber($_POST['fromInvoiceNumber']);
	}
	if(isset($_POST['dateSentOut'])){
	$ra->setDateSentOut($_POST['dateSentOut']);
	}
	if(isset($_POST['dateReturned'])){
	$ra->setDateReturned($_POST['dateReturned']);
	}
	if(isset($_POST['repairCost'])){
	$ra->setRepairCost($_POST['repairCost']);
	}
	if(isset($_POST['repairNumber'])){
	$ra->setRepairNumber($_POST['repairNumber']);
	}
	if(isset($_POST['description'])){
	$ra->setDescription($_POST['description']);
	}
	
	if(isset($_POST['submit'])){
	 	$ra->insertRa();
	 }
	 
?>

<html>
	
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<form method="post" action="addingproducts.php" >
	<table>
		<tr>
			<td><font color="blue">Style Number</font></td>
			<td><input type="text" name="styleNumber" id="style_number"/></td>
			<td><input type="submit" name="addProduct" value="Add" id="add_product"/></td>
		</tr>
		<tr>
			<td><font color="blue">Quantity</font></td>
			<td><input type="text" name="quantity" value="1"id="quantity"/></td>
		</tr>
		<tr>
			<td><font color="blue">Repair Number</font></td>
			<td><input type="text" name="repairNumber2" id="repair_number2"/></td>
		</tr>
		<tr>
			<td><font color="blue">Description</font></td>
			<td><textarea name="description2" id="description2"/></textarea></td>
		</tr>
		
	</table>
	</form>
	
	<form method="post" action="completeAddingNewRa.php">
		<tr>
			<td><input type="submit" name="viewThisRa" value="Finish" id="finish_add_product"/></td>
		</tr>
	</form>
	
</html>

<?php

	include("products.php");
	
	$products = new Products();
	
	if(isset($_POST['styleNumber'])){
		$products->setStyleNumber($_POST['styleNumber']);
	}
	
	if(isset($_POST['quantity'])){
		$products->setQuantity($_POST['quantity']);
	}
	
	if(isset($_POST['repairNumber2'])){
		$products->setRepairNumber($_POST['repairNumber2']);
	}
	
	if(isset($_POST['description2'])){
		$products->setDescription($_POST['description2']);
	}
	
	$products->setRaNumber($ra->maxIndexOfCurrentRa());
	
	$styleNumber = $products->getStyleNumber();
	$quantity = $products->getQuantity();
	$raNumber = $products->getRaNumber();
	$repairNumber = $products->getRepairNumber();
	$description = $products->getDescription();
		
	if($styleNumber && $quantity && isset($_POST['addProduct']) && isset($_SESSION['csrf_token'])){
		$products->addProduct();
	}
	if((!$styleNumber || !$quantity) && isset($_POST['addProduct'])){
			echo "<font color='red'>You need to enter both style number and quantity!</font>";
		}
	
	session_destroy();
?>