<?php
	//include_once("connection.php");
	include("ra.php");
	include("header.php");
	
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
	if(isset($_POST['ra_number'])){
	$ra->setRaNumber($_POST['ra_number']);
	}
	

	if(isset($_POST['update']) && isset($_POST['ra_number'])){
		$ra->updateRa();
	}
	
	if(isset($_GET['deleteInput']) && isset($_GET['delete'])){
		$ra->setRaNumber($_GET['deleteInput']);
		$ra->deleteRa();
		
	}

?>