<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once"../helpers/Formate.php";?>
<?php  include"../classess/cart.php"?>
<?php
$fm = new formate();
$ct = new Cart();
if (isset($_GET['shiftId'])) {
	$id = $_GET['shiftId'];
	$price = $_GET['price'];
	$date = $_GET['date'];
	$Updatedata = $ct->statusupdateById($id,$price,$date);
}
?>
<?php
if (isset($_GET['delId'])) {
	 $id = $_GET['delId'];
     $deleteproduct = $ct->delteproduct($id);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                 <?php
                if (isset($Updatedata)) {
                	echo "$Updatedata";
                }
                if (isset($deleteproduct)) {
                	echo "$deleteproduct";
                }
                ?> 
                <div class="block">   
                   
                    <table class="data display datatable" id="example">
                    
					<thead>
						<tr>
							<th>No</th>
							<th>ProductId</th>
							<th>Product</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Total</th>
							<th>Image</th>
							<th>ProductTime</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
								<?php
                    	$csmId = session::get('csmId');
                    	$productdetails = $ct->getproductDetais();
                    	if ($productdetails) {
                    		$i=0;
                    	 while ($result = $productdetails->fetch_assoc()) {
                    	 	$i++;

                    	?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $result['productId'] ?></td>
							<td><?php echo $result['productName'];?></td>
							<td>$<?php echo $result['price']; ?></td>
							<td><?php echo $result['quantity'] ?></td>
							<td>$<?php 
							$total = $result['price']*$result['quantity'];
							echo $total; 

							?>
							</td>
							
							<td><img src="<?php echo $result['image'];?>" height="40px" width="40px"></td>
							<td><?php echo $fm->dateformate($result['date']);?></td>
							<td><a href="coustomerditails.php?csmId=<?php echo $result[' 	csmId'];?>">Viwedetails</a></td>
							
								
								<?php
								if ($result['status']=='0') {
									?>
									<td>
										<a href="?shiftId=<?php echo $csmId;?> & price=<?php echo $result['price'];?> & date=<?php echo $result['date'];?>">Shifted</a>
									</td>
									<?php
								}elseif ($result['status'] == '1') {
								?>

							<td>Pending</td>
									<?php
								}
								elseif ($result['status'] == '2') {
									?>
								<td>
								<a onclick="return confirm('Are you sure to delete ');"href="?delId=<?php echo $result['productId'];?>">Confirm</a>
							</td>
								<?php
								}

								?>
							
						</tr>
						<?php
					}
				}
						?>
						
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
