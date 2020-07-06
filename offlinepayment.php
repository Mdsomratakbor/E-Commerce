<?php include"inc/header.php"; ?>
<?php
$login = session::get('cuslogin');
if ($login == false) {
	header('location:login.php');
}
?>
<?php
if (isset($_GET['orderid']) && $_GET['orderid'] == "order") {
    $csmId = session::get('csmId');
    $insertdata = $ct->datainsertorder($csmId);
    $cartdatadelete = $ct->deleteCart();
    header("location:success.php");
}
?>
<style>
.tblone {
    border: 1px solid #fff;
    width: 500px;
    margin: 0px auto;
    text-align: center;
    border: 2px solid #e1d7d7;
}
.tblone tr td{
    text-align: justify;
}
.division{
width: 50%;
float: left;
}
.tbltwo{
float: right;
text-align: left;
border: 4px solid #f0e6e6;
margin: 11px 14px;
width: 366px;
}
.tbltwo tr td{
text-align: justify;
padding: 8px 13px;
}
.order{

}
.order a {
    display: block;
    margin: 33px auto;
    border: 2px solid #bfa1a1;
    width: 102px;
    background: #ecdddd;
    font-size: 28px;
    padding: 4px 15px;
    text-align: center;
    color: #aa7d7d;
    border: 53px;
}
.oreder a :hover{
    background-color: red;
    color: black;
}
</style>
 <div class="main">
    <div class="content">
	      <div class="section group">
            <div class="division">
                    <table class="tblone">
                            <tr>
                                <th>No</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
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
                                <td><?php echo $result['price'];?></td>
                                <td><?php echo $result['quantity'];?></td>
                                <td>$
                                    <?php 
                                $total = $result['quantity'] * $result['price'];
                                echo $total; ?>
                                    
                                </td>
                               
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
                        <table class="tbltwo" style="" width="40%">
                            <tr>
                                <td>Sub Total</td>
                                <td>:</td>
                                <td>TK. $<?php 
                                
                                echo $sum;
                                 ?></td>
                            </tr>
                            <tr>
                                <td>VAT</td>
                                <td>:</td>
                                <td>10%(<?php echo $vat = $sum*0.1; ?>)</td>
                            </tr>
                            <tr>
                                <td>Grand Total</td>
                                <td>:</td>
                                <td>TK. $<?php 
                                $vat = $sum*0.1;
                                $grandtotal = $sum + $vat;
                                echo $grandtotal;

                                ?></td>
                            </tr>
                              <tr>
                                <td>
                                    Total Quantity
                                </td>
                                <td>:</td>
                                <td><?php 
                             
                                echo $qua;

                                ?></td>
                            </tr>
                       </table>
                       <?php
                    }
                    else{
                        echo "<span style='color:red;font-size:20px;'>Your cart is empty!! please shop some product</span>";
                    }
                       ?>
                    
            </div>
            <div class="division">
                    <?php
            $id = session::get('csmId');
            $profilecoustomer = $cosm->customerProfilebyId($id);
            if ($profilecoustomer) {
                while ($result = $profilecoustomer->fetch_assoc()) {
            ?>
               <table class="tblone">
                    <tr>
                        <td width="20%">Name</td>
                        <td width="5%">:</td>
                        <td><?php echo $result['name']?></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>:</td>
                        <td><?php echo $result['city'];?></td>

                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $result['email'];?></td>

                    </tr>
                    <tr>
                        <td>Zip-Code</td>
                        <td>:</td>
                        <td><?php echo $result['zip']?></td>

                    </tr>
                    <tr>
                        <td>Country</td>
                        <td>:</td>
                        <td><?php echo $result['country'];?></td>

                    </tr>
                    <tr>
                        <td>Adress</td>
                        <td>:</td>
                        <td><?php echo $result['address'];?></td>

                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td><?php echo $result['phone'];?></td>

                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><a href="updateprofile.php">Update Profile</a></td>

                    </tr>
                </table> 
                <?php
            }
        }
                ?>
            </div>
 
        
			</div>
            <div class="order">
                <a href="?orderid=order">Order</a>
            </div>
    </div>
 </div>
<?php include"inc/footer.php"; ?>
