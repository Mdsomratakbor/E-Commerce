<?php include"inc/header.php"; ?>
<?php
$login = session::get('cuslogin');
if ($login == false) {
	header('location:login.php');
}
?>
<style>
.success{
width: 661px;
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
	     <h2>SUCCESS</h2>
         <?php
         $csmId = session::get('csmId');
         $totalshow = $ct->gettotalamount($csmId);
         if ($totalshow) {
            $qun = 0;
            $sum = 0;
            while ($result = $totalshow->fetch_assoc()) {
                $quantity = $result['quantity'];
                $price = $result['price'];
                $qun = $qun + $quantity;
                $sum = $sum + $price;
                $sum = $sum*$qun;
                $VAT = $sum * 0.1;
                $total = $sum + $VAT;
         
         ?>
        
        <p style="color: red;">
            Total payable amount (Including VAT): $
            <?php 
            echo $total;
               }
         }

            ?>
        </p>
        <p>
            Thacks for Purchase.Receive your order successfully.We with contact you ASAP with dilevery details.Here is your order details. <a href="orderlist.php">visit here</a>
        </p>
     </div>
          <div class="back">
         <a href="cart.php">previous</a>
     </div>
            
        
			</div>
    </div>
 </div>
<?php include"inc/footer.php"; ?>


