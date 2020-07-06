
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classess/catagory.php';?>
<?php
if (!isset($_GET['catid']) || $_GET['catid']== NULL) {
    echo "<script>window.location = 'catlist.php'; </script>";
}
else{
    $id = $_GET['catid'];
}



$cat = new Catagory();
 if ($_SERVER['REQUEST_METHOD'] =='POST') {
     $catname = $_POST['catName'];
     $catUpdate = $cat->updateCat($catname,$id);
 }

 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
                <?php
                if (isset($catUpdate)) {
                    echo "$catUpdate";
                }
                ?>
               <div class="block copyblock"> 
                <?php 

                $getproduct = $cat->getproductId($id);
                if ($getproduct) {
                   while ($result = $getproduct->fetch_assoc()) {
                      
               
                  ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" value="<?php echo $result['catName']; ?>" class="medium" />
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