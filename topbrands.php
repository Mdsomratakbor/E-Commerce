<?php include"inc/header.php"; ?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Iphone</h3>
    		</div>
    		<div class="clear"></div>
    	</div>

	      <div class="section group">
	      	<?php
				$getIphone = $pd->iponebyIdbrand();
				if ($getIphone) {
					while ($result = $getIphone->fetch_assoc()) {
						?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details-3.php"><img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					 <h2><?php echo $result['productName']?></h2>
					 <p><?php echo  $fm->textshort($result['body'],60);?></p>
					 <p><span class="price"><?php echo $result['price']; ?></span></p>
				      <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				</div>
				<?php
			}
		}

				?>
			
			
				
			</div>
		<div class="content_bottom">
    		<div class="heading">
    		<h3>Samsung</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
					<?php 
					
				$getsamsung = $pd->samsungbybrand();
				if ($getsamsung ) {
					while ($result = $getsamsung ->fetch_assoc()) {
						
					?>
				<div class="grid_1_of_4 images_1_of_4">
				
					 <a href="details-3.php"><img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?></h2>
					 <p><?php echo  $fm->textshort($result['body'],60);?></p>
					 <p><span class="price">$<?php echo $result['price'];?></span></p>
				    
				       <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				
				</div>
				     <?php
				 }
				}
				     ?>
				
			</div>
	<div class="content_bottom">
    		<div class="heading">
    		<h3>Canon</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
					<?php 
					
				$getcanon= $pd->canonbybrand();
				if ($getcanon) {
					while ($result = $getcanon->fetch_assoc()) {
						
					?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details-3.php"><img src="admin/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName'];?></h2>
					 <p><?php echo  $fm->textshort($result['body'],60);?></p>
					 <p><span class="price">$<?php echo $result['price'];?></span></p>
				    
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				</div>
				<?php
			}
		}

				?>
				
				
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Acer</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
					<?php 
					
				$getcanon= $pd->acerbybybrand();
				if ($getcanon) {
					while ($result = $getcanon->fetch_assoc()) {
						
					?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details-3.php"><img src="admin/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName'];?></h2>
					 <p><?php echo  $fm->textshort($result['body'],60);?></p>
					 <p><span class="price">$<?php echo $result['price'];?></span></p>
				    
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				</div>
				<?php
			}
		}

				?>
				
				
			</div>
    </div>
 </div>
<?php include"inc/footer.php"; ?>

