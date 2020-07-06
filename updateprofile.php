<?php include"inc/header.php"; ?>
<?php
$login = session::get('cuslogin');
if ($login == false) {
	header("location:login.php");
}

?>
<?php
$cmdId = session::get('csmId');
if($_SERVER['REQUEST_METHOD'] =='POST' && isset($_POST["submit"])) {
$updatecoustomer = $cosm->profileupdate($_POST,$cmdId);
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
.tblone input[type="text"]{
	width: 500px;
	padding: 5px;
	font-size: 15px;

}
.heading h3{
	color: #6F6975;
}

</style>

 <div class="main">
<div class="content">
	      <div class="section group">
	      	<?php
	      	$id = session::get('csmId');
	      	$profilecoustomer = $cosm->customerProfilebyId($id);
	      	if ($profilecoustomer) {
	      		while ($result = $profilecoustomer->fetch_assoc()) {
	      	?>
	      	<from action="" method="post">
	      		<table class="tblone">
	      			<tr>
	      				<td colspan="2">
	      					<h2>Update Your Profiles</h2>
	      				</td>
	      				<?php
	      				if(isset($updatecoustomer)){
	      					echo $updatecoustomer;
	      				}
	      				?>
	      			</tr>
    			   <tr>
	      				<td width="20%">Name</td>
	      				
	      				<td><input type="text" name="name" value="<?php echo $result['name'];?>"></td>
	      			</tr>
	      			<tr>
	      				<td>City</td>
	      				<td><input type="text" name="city" value="<?php echo $result['city'];?>"></td>

	      			</tr>
	      			<tr>
	      				<td>Email</td>
	      			<td>
	      			<input type="text" name="email" value="<?php echo $result['email'];?>">
	      		 </td>

	      			</tr>
	      			<tr>
	      				<td>ZipCode</td>
	      				<td>
	      					<input type="text" name="zip" value="<?php echo $result['zip'];?>"></td>

	      			</tr>
	      			<tr>
	      				<td>Country</td>
	      				<td><input type="text" name="country" value="<?php echo $result['country'];?>">
	      				</td>

	      			</tr>
	      			<tr>
	      				<td>Adress</td>
	      				<td><input type="text" name="address" value="<?php echo $result['address'];?>"></td>

	      			</tr>
	      			<tr>
	      				<td>Phone</td>
	      				<td><input type="text" name="phone" value="<?php echo $result['phone'];?>"></td>

	      			</tr>
	      			<tr>
	      				<td></td>
 						<td>
 							<input type="submit" name="submit" value="Update">

 						</td>

	      			</tr>
	      		</table>
	      	</from>
	      		<?php
	      	}
	      }
	      		?>
				
			</div>

	
	
    </div>
 </div>
<?php include"inc/footer.php"; ?>