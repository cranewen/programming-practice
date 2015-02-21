<?php
include_once("connection.php");

class Ralog{
	private $raNumber;
	private $dateRaGiven;
	private $jewelryLine;
	private $thirdParty;
	private $customerNumber;
	private $contact;
	private $customer;
	private $dateRaArrived;
	private $withOrderNumber;
	private $fromInvoiceNumber;
	private $dateSentOut;
	private $dateReturned;
	private $repairCost;
	private $repairNumber;
	private $description;		
	
	function setRaNumber($raNumber){
		$this->raNumber = $raNumber;
	}
	
	function getRaNumber(){
		return $this->raNumber;
	}
	
	function setDateRaGiven($dateRaGiven){
		$this->dateRaGiven = $dateRaGiven;
	}
	
	function getDateRaGiven(){
		return $this->dateRaGiven;
	}
	
	function setJewelryLine($jewelryLine){
		$this->jewelryLine = $jewelryLine;
	}
	
	function getJewelryLine(){
		return $this->jewelryLine;
	}
	
	function setThirdParty($thirdParty){
		$this->thirdParty = $thirdParty;
	}
	
	function getThirdParty(){
		return $this->thirdParty;
	}
	
	function setCustomerNumber($customerNumber){
		$this->customerNumber = $customerNumber;
	}
	
	function getCustomerNumber(){
		return $this->customerNumber;
	}
	
	function setContact($contact){
		$this->contact = $contact;
	}
	
	function getContact(){
		return $this->contact;
	}
	
	function setCustomer($customer){
		$this->customer = $customer;
	}
	
	function getCustomer(){
		return $this->customer;
	}
	
	function setDateRaArrived($dateRaArrived){
		$this->dateRaArrived = $dateRaArrived;
	}
	
	function getDateRaArrived(){
		return $this->dateRaArrived;
	}
	
	function setWithOrderNumber($withOrderNumber){
		$this->withOrderNumber = $withOrderNumber;
	}
	
	function getWithOrderNumber(){
		return $this->withOrderNumber;
	}
	
	function setFromInvoiceNumber($fromInvoiceNumber){
		$this->fromInvoiceNumber = $fromInvoiceNumber;
	}
	
	function getFromInvoiceNumber(){
		return $this->fromInvoiceNumber;
	}
	
	function setDateSentOut($dateSentOut){
		$this->dateSentOut = $dateSentOut;
	}
	
	function getDateSentOut(){
		return $this->dateSentOut;
	}
	
	function setDateReturned($dateReturned){
		$this->dateReturned = $dateReturned;
	}
	
	function getDateReturned(){
		return $this->dateReturned;
	}
	
	function setRepairCost($repairCost){
		$this->repairCost = $repairCost;
	}
	
	function getRepairCost(){
		return $this->repairCost;
	}
	
	function setRepairNumber($repairNumber){
		$this->repairNumber = $repairNumber;
	}
	
	function getRepairNumber(){
		return $this->repairNumber;
	}
	
	function setDescription($description){
		$this->description = $description;
	}
	
	function getDescription(){
		return $this->description;
	}
	
	function insertRa(){
		$connection = new ConnectBastianDB();
		
		$raNumber = $this->getRaNumber();
		$dateRaGiven = $this->getDateRaGiven();
		$jewelryLine = $this->getJewelryLine();
		$thirdParty = $this->getThirdParty();
		$customerNumber = $this->getCustomerNumber();
		$contact = $this->getContact();
		$customer = $this->getCustomer();
		$dateRaArrived = $this->getDateRaArrived();
		$withOrderNumber = $this->getWithOrderNumber();
		$fromInvoiceNumber = $this->getFromInvoiceNumber();
		$dateSentOut = $this->getDateSentOut();
		$dateReturned = $this->getDateReturned();
		$repairCost = $this->getRepairCost();
		$repairNumber = $this->getRepairNumber();
		$description = $this->getDescription();
		
		$insertQuery = "INSERT INTO `ra_logs`(`ra_number`, `date_ra_given`, `jewelry_line`, `third_party`, `customer_number`, 
		`contact`, `customer`, `date_ra_arrived`, `with_order_number`, `from_invoice_number`,
		`date_sent_out`, `date_returned`, `repair_cost`, `repair_number`, `description`) VALUES
		 ('','$dateRaGiven','$jewelryLine','$thirdParty','$customerNumber','$contact','$customer',
		 '$dateRaArrived','$withOrderNumber','$fromInvoiceNumber','$dateSentOut','$dateReturned','$repairCost',
		 '$repairNumber','$description')";		
		if(mysqli_query($connection->connectBastian(), $insertQuery)){
			echo "You just created a new RA!";
			mysqli_close($connection->connectBastian());
		}else{echo "Something is wrong!";}
	}
	
	function deleteRa(){
		$connection = new ConnectBastianDB();
		$raNumber = $this->getRaNumber();
		$deleteStatement = "DELETE from `ra_logs` WHERE (ra_number='$raNumber')";
		if(mysqli_query($connection->connectBastian(), $deleteStatement)){
			echo "You have deleted RA: ", $this->raNumber;
		}
		mysqli_close($connection->connectBastian());
	}
	
	function searchRa(){
		$searchQuery = "SELECT * FROM `ra_logs` where (ra_number='$this->raNumber' OR customer_number='$this->customerNumber' OR
	customer LIKE '$this->customer' OR third_party LIKE '$this->thirdParty' OR with_order_number LIKE '$this->withOrderNumber' OR 
	from_invoice_number LIKE '$this->fromInvoiceNumber' OR repair_number LIKE '$this->repairNumber')";
		return $searchQuery;
	}
	
	function updateRa(){
		$connection = new ConnectBastianDB();
		
		$raNumber = $this->getRaNumber();
		
		$dateRaGiven = $this->getDateRaGiven();
		$jewelryLine = $this->getJewelryLine();
		$thirdParty = $this->getThirdParty();
		$customerNumber = $this->getCustomerNumber();
		$contact = $this->getContact();
		$customer = $this->getCustomer();
		$dateRaArrived = $this->getDateRaArrived();
		$withOrderNumber = $this->getWithOrderNumber();
		$fromInvoiceNumber = $this->getFromInvoiceNumber();
		$dateSentOut = $this->getDateSentOut();
		$dateReturned = $this->getDateReturned();
		$repairCost = $this->getRepairCost();
		$repairNumber = $this->getRepairNumber();
		$description = $this->getDescription();
		
		$updateQuery = "UPDATE `ra_logs` SET date_ra_given='$dateRaGiven', jewelry_line='$jewelryLine', third_party='$thirdParty', 
		customer_number='$customerNumber', contact='$contact', customer='$customer', date_ra_arrived='$dateRaArrived', 
		with_order_number='$withOrderNumber', from_invoice_number='$fromInvoiceNumber', date_sent_out='$dateSentOut', 
		date_returned='$dateReturned', repair_cost='$repairCost', repair_number='$repairNumber', description='$description' where 
		ra_number='$raNumber'";
		
		if(mysqli_query($connection->connectBastian(), $updateQuery)){
			echo "You just updated RA: ", $raNumber;
			mysqli_close($connection->connectBastian());
		}
	}
	
	// This function connects the Database, but needs to genarate a mysqli_fetch_array outside the function.
	function selectAll(){
		$connection = new ConnectBastianDB();
		
		$selectQuery = "SELECT * FROM `ra_logs`";
		$selectQueryResult = mysqli_query($connection->connectBastian(), $selectQuery);
	
		return $selectQueryResult;	
	}
	
	// Select the last element in the RA records, in order to add products to the RA just created.
	function maxIndexOfCurrentRa(){
		$connection = new ConnectBastianDB();
		
		$selectMaxQuery = "SELECT MAX(ra_number) FROM `ra_logs`";
		$selectMaxIndexOfCurrentRa = mysqli_query($connection->connectBastian(), $selectMaxQuery);
		$maxIndexOfCurrentRa = mysqli_fetch_array($selectMaxIndexOfCurrentRa);
		return  $maxIndexOfCurrentRa[0];  // Because in this case, the array only has one element, so use [0] to get the element.
	}

}


?>
