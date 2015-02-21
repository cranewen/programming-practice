<?php
	include("header.php");
	include("products.php");
	
	session_start();
	$product = new Products;
	$_SESSION['raNumber'] = $_GET['ra'];
	$product->setRaNumber($_SESSION['raNumber']);
	$raNum = $product->getRaNumber();
	
?>
<html>
	<h3 class="ra_number_title">
		<?php echo "RA ", $raNum, "'s detail."; ?>
	</h3>
	<form method="get" action="singleRaRecord.php">
		<input type="text" name="ra" value="<?php echo $raNum;?>" id="ra_number" />
		<input type="text" name="styleNumber" id="style_number" placeholder="Style Number"/>
		<input type="text" name="quantity" id="quantity" placeholder="Quantity"/>
		<input type="text" name="repairNumber3" id="repairNumber3" placeholder="Repair Number"/>
		<textarea name="description3" id="description3" placeholder="Type description here."></textarea>
		<input type="submit" name="addProduct" value="Add"/>
		<input type="submit" name="deleteProduct" value="Delete"/>
	</form>	
<?php
	
	
	if(isset($_GET['styleNumber']) && isset($_GET['quantity']) && isset($_GET['addProduct']) && isset($_SESSION['raNumber'])){
		$product->setStyleNumber($_GET['styleNumber']);
		$product->setQuantity($_GET['quantity']);
		$product->setRepairNumber($_GET['repairNumber3']);
		$product->setDescription($_GET['description3']);
		$product->addProduct();
	}
	
	if(isset($_GET['styleNumber']) && isset($_GET['deleteProduct'])){
		$product->setStyleNumber($_GET['styleNumber']);
		$product->deleteProduct();
	}	
	
	if(isset($_GET['ra'])){
		
		$result = $product->selectProducts();
		
		echo "<table>";
		echo "<tr>";
				 echo "<th></th>";
			 	 echo "<th>","<font color='green'>Style Number</font>","</th>";
			 	 echo "<th>","<font color='green'>Quantity</font>","</th>";
			 	 echo "<th>","<font color='green'>Repair Number</font>","</th>";
			 	 echo "<th>","<font color='green'>Description</font>","</th>";
				 echo "</tr>";
			while($row = mysqli_fetch_array($result)){
				 echo "<tr>";
				 echo "<th></th>";
			 	 echo "<th>",$row['style_number'],"</th>";
			 	 echo "<th>",$row['quantity'],"</th>";
			 	 echo "<th>",$row['repair_number'],"</th>";
			 	 echo "<th>",$row['description'],"</th>";
				 echo "</tr>";
			}
			echo '</form>';
		echo "</table>";
		
		}
	
?>	
	
</html>

