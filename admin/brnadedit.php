<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classess/brand.php';?>
<?php
 if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
     echo "<script>window.location ='brandlist.php';</script>";
 }
 else{
    $id = $_GET['brandid'];
 }

 ?>
<?php
$brand = new Brand();
 if ($_SERVER['REQUEST_METHOD'] =='POST') {
     $brandname = $_POST['brandName'];
     $brandUpdate = $brand->updateBrand($brandname,$id);
 }

 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Brand</h2>
                <?php
                if (isset($brandUpdate )) {
                    echo "$brandUpdate ";
                }
                ?>
               <div class="block copyblock"> 
                <?php
                $getbrand = $brand->showbrandnamebyId($id);
                if ($getbrand) {
                    while ($result = $getbrand->fetch_assoc()) {
                        
                
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" value="<?php echo $result['brandName']; ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                        }
                }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>