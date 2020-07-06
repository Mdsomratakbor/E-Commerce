<?php include"inc/header.php"; ?>
<?php
$login = session::get('cuslogin');
if ($login == true) {
	header("location:order.php");
}
?>
 <div class="main">
    <div class="content">
    	<?php
	   if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])) {
	   
	      $coustomerlogin = $cosm->coustomerLogin($_POST);
        }

        ?>
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<?php 
        	if (isset($coustomerlogin)) {
        		echo "$coustomerlogin";
        	}
        	?>
        	<form action="" method="post">
                	<input  type="text" name="email" placeholder="Email">
                    <input name="password" type="password" placeholder="Password">
                    <div class="buttons"><div><button class="grey" name="login">Sign In</button></div>
                    </div>
                    </form>
                </div>
                   <?php
                    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['registretion'])) {
                    	$coustomersreg = $cosm->coustomerRegistretion($_POST);
                    }

                    ?>
    	<div class="register_account">

                  
    		<h3>Register New Account</h3>
    		<?php
    		if (isset($coustomersreg )) {
    			echo "$coustomersreg ";
    		}
    		?>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Name" >
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="City">
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Zip-code">
							</div>
							<div>
								<input type="text" name="email" placeholder="Email">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Address">
						</div>
		    		<div>
					<input type="text" name="country" placeholder="country">
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Phone-number">
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="Password">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="registretion">Create Account</button></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include"inc/footer.php"; ?>