
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classess/brand.php';?>
<?php
$cat = new Brand();
 if ($_SERVER['REQUEST_METHOD'] =='POST') {
     $brandname = $_POST['brandName'];
     $brandInsert = $cat->isnsertBrand($brandname);
 }

 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
                <?php
                if (isset($brandInsert)) {
                    echo "$brandInsert";
                }
                ?>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" placeholder="Enter Brand Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>