<?php include"inc/header.php"; ?>
<?php 
if (isset($_GET['delpro'])) {
		$id = $_GET['delpro'];
	$deletecart = $ct->deletecartbyId($id);
}
?>
<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
	$cartid = $_POST['carId'];
	$quantity = $_POST['quantity'];
	$updatcart = $ct->updatecartbyId($cartid,$quantity);
	if ($quantity <= 0) {
	$updatcart = $ct->deletecartbyId($cartid);
}
}
 ?>
 <?php
 if (isset($_GET['id'])) {
 	echo "<meta http-equiv='refresh' content='0';URL=?id=somrat/>";
 }
 ?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
			    	<?php 
			    	if (isset($updatcart )) {
			    		echo "$updatcart ";
			    	}
			    	if (isset($deletecart)) {
			    		echo "$deletecart";
			    	}
			    	?>
						<table class="tblone">
							<tr>
								<th width="5%">SL</th>
								<th width="25%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php 
							$getcart = $ct->cartbysId();
							if ($getcart) {
								$i=0;
								$sum = 0;
								$qua = 0;
								while ($result = $getcart->fetch_assoc()) {
									$i++;
									
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName'];?></td>
								<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
								<td><?php echo $result['price'];?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="carId" value="<?php echo $result['carId']; ?>"/>
										<input type="number" name="quantity" value="<?php echo $result['quantity']; ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>$<?php 
								$total = $result['quantity'] * $result['price'];
								echo $total;


								?></td>
								<td><a onclick="return confirm('Are you sure to delte');" href="?delpro=<?php echo $result['carId'];?>">X</a></td>
							</tr>
							<?php 
							$qua = $qua + $result['quantity'];
							$sum = $sum + $total;
							session::set("quan","$qua");
							session::set("sum","$sum");
							}
						}

							?>
							
						</table>
						<?php
						if ($getdata) {
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>TK. $<?php 
								
								echo $sum;
								 ?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>TK. $<?php 
								$vat = $sum*0.1;
								$grandtotal = $sum + $vat;
								echo $grandtotal;

								?></td>
							</tr>
					   </table>
					   <?php
					}
					else{
						echo "<script>window.location:index.php</script>";
					}
					   ?>
					
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include"inc/footer.php"; ?>