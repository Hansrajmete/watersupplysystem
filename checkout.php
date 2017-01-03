<?php
include 'header.php'
?>
	<?php
		$i=0;
			$cursor=$pro->find();		
?>




   			
<div class="container">




	<div class="check">	 
			 <div class="col-md-3 cart-total">
			 <a class="continue" href="index.php">Continue to Shop</a>
			 <div class="price-details">
				 <h3>Price Details</h3>
				 <span>Total</span>
				 <span class="total1">₹<?php echo $total; ?></span>
				 
				 <span>Delivery Charges</span>
				 <span class="total1">₹0.00</span>
				  <span>Discount</span>
				 <span class="total1">₹0.00</span>
				 <div class="clearfix"></div>				 
			 </div>	

			 <ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>	
			   <li class="last_price"><span>₹ <?php echo $total; ?></span></li>
			   <div class="clearfix"> </div>
			 </ul>
		
			 
			 <div class="clearfix"></div>
			 <a class="order" href="place_order.php">Place Order</a>
			 <div class="total-item">
				 
			 </div>
			</div>
		 <div class="col-md-9 cart-items">
			 <h1>My Shopping Bag (<?php echo $items ?>)</h1>
				<?php 

   					if($items==0)
   						echo "Your Cart is Empty!!";
   					else
   						{



   								foreach ( $cursor as $value )
		
   					{	if($value['Product'])
   								{

   									if($_SESSION[$value['Product']['pro_id']]['0']==1)
   									{
   						?>
   						
			 				<div class="cart-header">
			 				<form id='<?php echo $i; ?>' action="rem_cart.php" method="post">
				 			<div class="close1" onclick="document.getElementById(<?php echo $i; ?>).submit()"><input type="hidden" name="pro_id" value=<?php echo $value['Product']['pro_id'] ?> /></div></form>
								 <div class="cart-sec simpleCart_shelfItem">
							<div class="cart-item cyc">
							 <img src="images/<?php echo $value['Product']['pro_id']?>.jpg" class="img-responsive" alt=""/>
							</div>
					   		<div class="cart-item-info">
							<h3><a href="#"><?php echo $value['Product']['pro_name'] ?></a><span><?php echo $value['Product']['details'] ?></span></h3>
							<ul class="qty">
							<li><p>Qty : </p>

							<form id='<?php echo $items+$i; ?>' action="qty_update.php" method="post">
   			<input type='button' name='subtract' onclick='javascript: document.getElementById("<?php echo $items*3+$i; ?>").value--;if (document.getElementById("<?php echo $items*3+$i; ?>").value<1) {document.getElementById("<?php echo $items*3+$i; ?>").value=1}' value='-'/>
			<input type='text' name='<?php echo $items*3+$i; ?>' id="<?php echo $items*3+$i; ?>" value=<?php echo $_SESSION[$value['Product']['pro_id']]['2'] ?> style="width: 15%"/>
			<input type='button' name='add' onclick='javascript: document.getElementById("<?php echo $items*3+$i; ?>").value++;' value='+'/>
			<input type="hidden" name="pro_id" value=<?php echo $value['Product']['pro_id'] ?> />
			<input type="hidden" name="qtynum" value=<?php echo $items*3+$i; ?> />
			<input type="submit" name="submit" value="Update" onclick="document.getElementById('<?php echo $items+$i; ?>').submit()">
		</form></li>
							</ul>
						
							 <div class="delivery">
							 <p>Price Each : ₹ <?php echo $value['Product']['price'] ?></p>
							 <span><b>NEXT DAY DELIVERY</b></span>
							 <div class="clearfix"></div>
				        </div>	
					   </div>
					   <div class="clearfix"></div>
											
				  </div>
			 </div>
			 <?php
			 $i++;
			}
		}}}
			?>
		
		 </div>
		 
		
			<div class="clearfix"> </div>
	 </div>
	 </div>
<?php
include 'footer.php'
?>
</body>
</html>