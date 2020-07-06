<?php include"inc/header.php"; ?>
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
.heading h3{
	color: #6F6975;
}

</style>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Your Profile Details</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
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
 </div>
<?php include"inc/footer.php"; ?>

