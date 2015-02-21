<?php
include_once("connection.php");
//include("ra.php");

class Products{
	private $raNumber;
	private $styleNumber;
	private $quantity;
	private $repairNumber;
	private $description;	
	
	function setRaNumber($raNumber){
		$this->raNumber = $raNumber;
	}
	
	function getRaNumber(){
		return $this->raNumber;
	}

	function setStyleNumber($styleNumber){
		$this->styleNumber = $styleNumber;
	}
	
	function getStyleNumber(){
		return $this->styleNumber;
	}
	
	function setQuantity($quantity){
		$this->quantity = $quantity;
	}
	
	function getQuantity(){
		return $this->quantity;
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
	
	function selectProducts(){
		$connection = new ConnectBastianDB();
		$raNumber = $this->getRaNumber();
		$selectQuery = "SELECT * FROM `products` WHERE ra_number='$raNumber'";
		$selectQueryResult = mysqli_query($connection->connectBastian(), $selectQuery);
		return $selectQueryResult;
	}
		
	function addProduct(){
		$connection = new ConnectBastianDB();
		$raNumber = $this->getRaNumber();
		$styleNumber = $this->getStyleNumber();
		$quantity = $this->getQuantity();
		$repairNumber = $this->getRepairNumber();
		$description = $this->getDescription();
		$addProductQuery = "INSERT INTO `products` (ra_number, style_number, quantity, repair_number, description) VALUES 
		('$raNumber','$styleNumber','$quantity','$repairNumber','$description')";
		if(mysqli_query($connection->connectBastian(), $addProductQuery)){
			echo "You just added product: ", $styleNumber, " to RA: ", $raNumber; 
		}
	}
	
	function deleteProduct(){
		$connection = new ConnectBastianDB();
		$deleteProductQuery = "DELETE FROM `products` WHERE (ra_number='$this->raNumber' && style_number='$this->styleNumber')";
		if(mysqli_query($connection->connectBastian(), $deleteProductQuery)){
			echo "You just deleted a product: ",$this->styleNumber, " from RA: ", $this->raNumber;
		}
	}
	
	function editProduct(){
		$connection = new ConnectBastianDB();
		$raNumber = $this->getRaNumber();
		$styleNumber = $this->getStyleNumber();
		$quantity = $this->getQuantity();
		$repairNumber = $this->getRepairNumber();
		$description = $this->getDescription();
		$editProductQuery = "UPDATE `product` SET style_number='$styleNumber', quantity='$quantity', 
		repairNumber='$repairNumber', description='$description'";
		if(mysqli_query($connection->connectBastian(), $editProductQuery)){
			echo "You just edited a product: " , $this->styleNumber, " from RA: ", $this->raNumber;
		}
	}
	
	// Searching by style number, then all the customers who have the style number will come out.
	function searchThroughStyleNumber(){
		$connection = new ConnectBastianDB();
		$styleNumber = $this->getStyleNumber();
		$searchQuery = "SELECT * FROM `products` LEFT JOIN `ra_logs` on ra_logs.ra_number = products.ra_number 
		WHERE products.style_number='$styleNumber'";
		$searchQueryResult = mysqli_query($connection->connectBastian(), $searchQuery);
		return $searchQueryResult;
	}
}

?>