
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classess/catagory.php';?>
<?php include '../classess/coustomer.php';?>
<?php
$cat = new Catagory();
$cust = new Coustomer();
if (isset($_GET['csmId'])) {
    $cusId = $_GET['csmId'];
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    echo "<script>window.location = 'orderlist.php'</script>";
}
 ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Coustomer Details</h2>
               <div class="block copyblock"> 
                 <form action="" method="post">
                    <?php 
                      $showdetails = $cust->coustomerdetais($cusId);
    if ($showdetails) {
        while ($value = $showdetails->fetch_assoc()) {
            
    
                    ?>
                    <table class="form">					
                        <tr>
                            <td>
                               Name :
                            </td>
                            <td>
                                <input type="text"  value="<?php echo $value['name'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                City :
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $value['city'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                               Zip-Code :
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $value['zip'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                Phone :
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $value['phone'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                Email :
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $value['email'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                Country :
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $value['country'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                Address :
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $value['address'];?>" class="medium" />
                            </td>
                        </tr>
                      
						<tr> 
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
                            </td>
                        </tr>
                    </table>
                    <?php
                        }
                        }

                    ?>
                    </form>

                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>