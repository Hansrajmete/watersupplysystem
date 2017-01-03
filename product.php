<?php $name= $_GET["prod"]; 
include 'header.php';

$i=0;
  for($i=0;$i<19;$i++)
  	{if($_SESSION['prod'][$i]['0']==$_GET['prod'])
		{break;
			}
}

?>
<br><br>
<!-- content -->
<div class="container">
<div class="women_main">
	<!-- start content -->
			<div class="row single">
				<div class="col-md-9 det">
				  <div class="single_left">
					<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
									<img class="etalage_thumb_image" src="images/<?php echo $name?>.jpg" class="img-responsive" />
									<img class="etalage_source_image" src="images/<?php echo $name?>.jpg" class="img-responsive" title="" />
							</li>
						</ul>
						 <div class="clearfix"></div>		
				  </div>
				   <?php
  					      include_once("Config.php");
  					      $res = $pro->findOne(array('Product.pro_id' => $name));
  					    ?>
				  <div class="desc1 span_3_of_2">
					<h3><?php echo $res['Product']['pro_name'] ?></h3>
					
					<br>
					<span class="code">Available : <?php echo $res['Product']['available'] ?> in stock</span>
					<p><?php echo $res['Product']['details'] ?></p>
						<div class="price">
							<span class="text">Price:</span>
							<span class="price-new">					 <div class="grid_1 simpleCart_shelfItem">
				    
					 <div class="add_cart"><span class="item_price"><h1>₹ <?php echo $res['Product']['price'] ?></h1></span></div>
					 <form id='pp' action="proadd.php" method="post">  
					<?php 
					if($res['Product']['available']==0)
						{
							?>
							<div class="add_cart" ><input type="hidden" name="pro_id" value=<?php echo $res['Product']['pro_id'] ?>  /> Out of Stock
							<?php
						}
					 	else 
					 	if($_SESSION[$res['Product']['pro_id']]['0']=='0')
					 	{
					 		?>
					<div class="add_cart"><a style="cursor: pointer;" onclick="document.getElementById('pp').submit()" ><input type="hidden" name="pro_id" value=<?php echo $res['Product']['pro_id'] ?> />add to cart</a>
						<?php }
						else
						{
							?>
								<div class="add_cart" ><input type="hidden" name="pro_id" value=<?php echo $res['Product']['pro_id'] ?> />added to cart
								<?php
						}
						?>












					</form>
					 </div></span>
					
					
			   	 </div>
          	    <div class="clearfix"></div>
          	   </div>
          	   <!-- <div class="single-bottom1">
					<h6>Details</h6>
					<p class="prod-desc"></p>
				</div>-->
				
	       </div>	
	
	<!-- end content -->
</div>
</div>
</div>
<br><br><br><br>

<?php
include 'footer.php'
?>
</body>
</html>
