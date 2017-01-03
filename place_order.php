<?php
session_start();
include_once("Config.php");
$cursor=$pro->find();
$total=0;
		$i=0;

if($_SESSION['logged']==0){
echo "<script type='text/javascript'>alert('You Must Login first'); window.location.href='register.php';</script>";}
else if($_SESSION['items']==0)
{
echo "<script type='text/javascript'>alert('Cart is Empty'); window.location.href='checkout.php';</script>";}
else{
$res = $pro->findOne(array('Customer.U_name' => $_SESSION['U_name']));

?>

<!DOCTYPE html>
<html>
<head>
<title>ORDER REVIEW </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
	<div class="main">
		<h1>ORDER REVIEW </h1>
		<div class="content">
			
			<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
					<script type="text/javascript">
						$(document).ready(function () {
							$('#horizontalTab').easyResponsiveTabs({
								type: 'default', //Types: default, vertical, accordion           
								width: 'auto', //auto or any width like 600px
								fit: true   // 100% fit in a container
							});
						});
						
					</script>
						<div class="sap_tabs">
							<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
								<div class="pay-tabs">
									<h2>Order Details</h2>
									  <?php 

   					
   						{



   								foreach ( $cursor as $value ){
									if($_SESSION[$value['Product']['pro_id']]['0']==1)
   								
   					{	
   				?>
   						
			 			
			 				
				 			
							<div class="cart-sec simpleCart_shelfItem">
					   		<div class="cart-item-info">
							<h3><?php echo ($i+1).') '.$value['Product']['pro_name'] ?></h3>
							<p>Qty : <?php echo $_SESSION[$value['Product']['pro_id']]['2'] ?></p>
							 <div class="delivery">
							 <p>Price Each : ₹ <?php echo $value['Product']['price'] ?></p>
							 <div class="clearfix"></div>
				        </div>	
					   </div>
					   <div class="clearfix"></div>
											
				  </div><br>
			 <?php
			 $i++;
			}}
		}
			?>
			<hr>
			<p>Total Amount :- ₹ <?php echo $_SESSION['total'] ?></p>
								</div>

								<div class="resp-tabs-container">
									<h4>Select your delivery address</h4>
													
													<form name="adrform" action="payment.php" method="post">
													 	 <input type="radio" name="address" value="same" Onclick="showadr();"><?php echo $res['Customer']['address'] ?><br>
  															<input type="radio" name="address" value="other" checked="checked" Onclick="showadr();"> Other<br>
  															<div id="address">
															      <input type="text" name="other" value=""/>
															  </div>
														<!--<input type="text" value="name@email.com" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'name@email.com';}" required="">
														<input type="password" value="PASSWORD" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'PASSWORD';}" required="">-->
															<div class="user-grids">
																
																<div class="user-right">
																	<input  type="submit" value="Proceed">
																</div>
																<div class="clear"></div>
															</div>
													</form>
											
								</div>	
							</div>
						</div>	

		</div>
		
	</div>
</body>
</html>











<script type="text/javascript">
function aff_div(ladiv) {
  document.getElementById(ladiv).style.display = "inline";
}

function hideadr(ladiv) {
  document.getElementById(ladiv).style.display = "none";
}

function showadr() {
  if (document.forms.adrform.address[1].checked == true) {
    aff_div("address");
  }

  if (document.forms.adrform.address[0].checked == true) {
    hideadr("address");
  }
}
</script>

<?php
}
?>