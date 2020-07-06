<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once"../helpers/Formate.php";?>
<?php include "../classess/product.php";?>
<?php
$pd = new Product();
$fm = new formate();
?>
<?php 
	if (isset($_GET['delid'])) {
		$id = $_GET['delid'];
		$delteproduct = $pd->productDelete($id);
	}


?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>

        <div class="block">  
        	<?php
				if (isset($delteproduct)) {
					echo "$delteproduct";
				}
				?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL.</th>
					<th>Post Title</th>
					<th>Catagory</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$productlistshow = $pd->getallproduct();
				if ($productlistshow) {
					$i = 0;
					while ($result = $productlistshow->fetch_assoc()) {
						$i++;
				?>
			
			
				<tr class="odd gradeX">
					
					<td><?php echo $i; ?></td>
					<td><?php echo $result['productName']; ?></td>
					<td><?php echo $result['catName']; ?></td>
					<td><?php echo $result['brandName'];?></td>
					<td><?php echo $fm->textshort($result['body'],40);?></td>
					<td>$<?php echo $result['price'];?></td>
					<td><img src="<?php echo $result['image'];?> " height="40px" width="40px"></td>
					<td>
						<?php
						if ($result['producttype'] == 0) {
							echo "Featured";
						}
						else{
							echo "Non-Featured";
						}
						?>
						</td>
					<td><a href="productedit.php?proid=<?php  echo $result['productId'];?>">Edit</a> || <a onclick="return confirm('Are you sure to delete this product !');" href="?delid=<?php echo $result['productId'];?>">Delete</a></td>
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
