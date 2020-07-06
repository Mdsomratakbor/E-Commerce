<?php include"inc/header.php"; ?>
<?php
$login = session::get('cuslogin');
if ($login == false) {
	header('location:login.php');
}
?>
<?php
if (isset($_GET['shiftId'])) {
    $id = $_GET['shiftId'];
    $price = $_GET['price'];
    $date = $_GET['date'];
    $updatestatu = $ct->updateStatusbyId($id,$price,$date);
}
?>
<?php 
 if (isset($_GET['delpro'])) {
     $id = $_GET['delpro'];
     $deleteproduct = $ct->delteproductbyId($id);
 }

?>
<style>
.success{
width: 100%;
border: 1px solid #6e6363;
margin: 0px auto;
border-radius: 4px;
text-align: center;
min-height: 300px;
}
.success h2{
margin: 38px auto;
margin-bottom: 38px;
text-align: center;
border-bottom: 1px solid #c2baba;
width: 565px;
margin-bottom: 51px;
padding-bottom: 16px;
font-size: 29px;

}
.success p{
line-height: 26px;
text-align: center;
width: 653px;
font-size: 20px;
font-family: t;
color: #4a4a4a;
}
.success a{

}


.back a{
width: 160px;
margin: 5px auto 0;
margin-top: 5px;
padding: 6px 4px;
text-align: center;
display: block;
background: #dbc4c4;
color: #635a5a;
font-size: 22px;
margin-top: 17px;
border: 1px solid #bfa7a7;
border-radius: 7px;
}
</style>
 <div class="main">
    <div class="content">
	      <div class="section group">
            <div class="success">
	     <h2>Your Order Details</h2>
         <?php
         if (isset( $deleteproduct)) {
            echo " $deleteproduct";         
        }
          ?>
        <table class="tblone">
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php 
                            $csmId = session::get('csmId');
                            $getcart = $ct->getorderbyId($csmId);
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
                                <td><?php echo $result['quantity'];?></td>
                                <td>$<?php 
                                $total = $result['quantity'] * $result['price'];
                                echo $total;


                                ?></td>
                                <td>
                                    <?php  echo $result['date'];?>
                                </td>
                                <td>
                                    <?php
                                    if ($result['status'] =='0') {
                                        echo "Pending";
                                    }
                                elseif($result['status'] =='1'){
                                        ?>
                                <a href="?shiftId=<?php echo $csmId;?> & price=<?php echo $result['price'];?>  & date=<?php echo $result['date'];?>">Received</a>
                                        <?php

                                            }
                                            elseif($result['status'] =='2'){
                                                ?>
                                              <a href="?confirmId=<?php echo $csmId;?> & price=<?php echo $result['price'];?> $date=<?php echo $result['date'];?>">Confirm</a> 
                                              <?php  
                                            }
                                    ?>


                                </td>
                                <?php
                                if ($result['status'] =='0') {
                                    
                               
                                 ?>
                                <td>N/A</td>
                                <?php
                                 }elseif (($result['status'] =='1')){
                                    ?>
                                  <td>A</td>
                                    <?php
                                }else{
                                    ?>
                                    <td><a onclick="return confirm('Are you sure to delete');" href="?delpro=<?php echo $result['carId'];?>">X</a></td>
                                    <?php
                                 }

                                ?>
                            </tr>
                            <?php
                        }
                    }
                            ?>
                            
                        </table>
        
			</div>
    </div>
 </div>
<?php include"inc/footer.php"; ?>
