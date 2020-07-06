<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include "../classess/catagory.php";
$cat = new Catagory();

?>
<?php
 if(isset($_GET['delcat'])){
 	$id = $_GET['delcat'];
 	$delcat = $cat->delcatbyId($id);
 }
?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">
                <?php
                if (isset($delcat)) {
                	echo "$delcat";
                }

                 ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$result = $cat->catlist();
						if ($result) {
							$i=0;
							while ($value = $result->fetch_assoc()) {
								$i++;
						
						 ?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php  echo $value['catName']; ?></td>
							<td><a href="catedit.php?catid=<?php echo $value['catId']; ?>">Edit</a> || <a onclick="confirm('Are sure to delete this product')" href="?delcat=<?php echo $value['catId']; ?>">Delete</a></td>
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

