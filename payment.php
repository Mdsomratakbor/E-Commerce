<?php include"inc/header.php"; ?>
<?php
$login = session::get('cuslogin');
if ($login == false) {
	header('location:login.php');
}
?>
<style>
.payment{
width: 661px;
border: 1px solid #6e6363;
margin: 0px auto;
border-radius: 4px;
text-align: center;
min-height: 300px;
}
.payment h2{
margin: 38px auto;
margin-bottom: 38px;
text-align: center;
border-bottom: 1px solid #c2baba;
width: 565px;
margin-bottom: 51px;
padding-bottom: 16px;
font-size: 29px;

}
.payment a{
background: #afaeb9 no-repeat;
padding: 8px 21px;
color: #5d5b5b;
font-size: 24px;
border-radius: 5px;
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
            <div class="payment">
	     <h2>Chose Payment Option</h2>
         <a href="offlinepayment.php">Offline Payment</a>
         <a href="onlinepayment.php">Online Payment</a>
    
     </div>
          <div class="back">
         <a href="cart.php">previous</a>
     </div>
 
        
			</div>
    </div>
 </div>
<?php include"inc/footer.php"; ?>
