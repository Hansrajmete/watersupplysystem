<?php
include 'header.php';
include_once('Config.php');
?>
<!-- content -->
<div class="container">
<div class="women_main">
	<!-- start sidebar -->
	<div class="col-md-3 s-d">
	  <div class="w_sidebar">
		<div class="w_nav1">
			<h4>All</h4>
			<ul>
				<li><a href="#">OFFERS</a></li>
				<li><a href="jarcan.php">Jars and Cans</a></li>
				<li><a href="purifiers.php">Water Purifiers</a></li>
				<li><a href="pouch.php">Water Pouchs</a></li>
				<li><a href="distiller.php">Water Distiller</a></li>
			</ul>	
		</div>
		
		
	</div>
   </div>
	<!-- start content -->
	<div class="col-md-9 w_content">
		<div class="women">
			<a href="#"><h4> Water Distillers:<span> 2 item(s)</span> </h4></a>
			<ul class="w_nav">
						<li>Sort : </li>
		     			<li><a class="active" href="#">popular</a></li> |
		     			<li><a href="#">new </a></li> |
		     			<li><a href="#">discount</a></li> |
		     			<li><a href="#">price: Low High </a></li> 
		     			<div class="clear"></div>	
		     </ul>
		     <div class="clearfix"></div>	
		</div>
	<!-- grids_of_4 -->
	  <?php
        
  $cursor=$pro->find();
  $cursorimg=$img->find();
  $t=1;
  $c=0;
  $p=-1;
  foreach ($cursor as $res) {
  	if($res['Product']['pro_type']=='Distiller')
         {
										         	if($c==0){

										 			 ?>
												<div class="grids_of_4">
														<?php

										         			}
		?>
 






		  <div class="grid1_of_4">
				<div class="content_box">
				<form id='<?php echo $t ?>' action="product.php" method="get">
				<a style="cursor: pointer;" onclick="document.getElementById('<?php echo $t ?>').submit()" >
			   	   	<?php $output=$img->findOne(array('pro_id'=> $res['Product']['pro_id']));      
				echo '<img class="img-responsive" alt="" src="data:image/jpg;base64,'.$output['image'].'" />';
				?>
				   	 
				   	   			
				    <h4>
  					<input type="hidden" name="prod" value="<?php echo $res['Product']['pro_id'] ?>" /> <?php echo $res['Product']['pro_name'] ?></a></form></h4>


				     <p>Only <?php echo $res['Product']['available'] ?> Available</p>
					 <div class="grid_1 simpleCart_shelfItem">
				    <form id='<?php echo $p ?>' action="proadd.php" method="post">
					 <div class="add_cart"><h6>Only ₹ <?php echo $res['Product']['price'] ?> </h6></div>
					<?php 
											if($res['Product']['available']==0)
						{
							?>
							<div class="add_cart" ><input type="hidden" name="pro_id" value="<?php echo $res['Product']['pro_id']?>" />Out of Stock
							<?php
						}
					 	else if($_SESSION[$res['Product']['pro_id']]['0']=='0')
					 	{
					 		?>
					<div class="add_cart"><a style="cursor: pointer;" onclick="document.getElementById('<?php echo $p ?>').submit()" ><input type="hidden" name="pro_id" value="<?php echo $res['Product']['pro_id']?>" />add to cart</a>
						<?php }
						else
						{
							?>
								<div class="add_cart" ><input type="hidden" name="pro_id" value="<?php echo $res['Product']['pro_id']?>" />added to cart
								<?php
						}
						?>

					 </div></div>
					 </form>
			   	</div>
			</div>


			<?php
			$t++;
			$c++;
			$p--;
			if($c==4){
			$c=0;

			?>
			<div class="clearfix"></div>
					</div>
					<?php
			}
}}
			?>













			
			<div class="clearfix"></div>
		</div>
		<!-- end grids_of_4 -->
		
		
	</div>
	<div class="clearfix"></div>
	
	<!-- end content -->
</div>
</div>

<?php
include 'footer.php'
?>
</body>
</html>
