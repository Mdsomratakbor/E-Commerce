<?php include"inc/header.php"; ?>
<?php
$login = session::get('cuslogin');
if ($login == false) {
	header('location:login.php');
}
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Product order</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	     <p>orderpage</p>
			</div>
    </div>
 </div>
<?php include"inc/footer.php"; ?>

