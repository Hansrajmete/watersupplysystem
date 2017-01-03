<?php
					session_start();
					error_reporting(0);
   					include_once("Config.php");
   					$total=0;
   					$items=0;
					


$cursor=$pro->find();
foreach ($cursor as $temp) {
  if($temp['Product'])
 	{
	    if(!$_SESSION[$temp['Product']['pro_id']])
	    {
			$_SESSION[$temp['Product']['pro_id']]=array(0,$temp['Product']['price'],0);    //0=notadded,price,quantity

	  	}
	  	if($_SESSION[$temp['Product']['pro_id']]['0']==1)
	  	{
   			$total=$total+ $_SESSION[$temp['Product']['pro_id']]['1']*$_SESSION[$temp['Product']['pro_id']]['2'];
   			$items++;
	  	}
	}
}
$_SESSION['items']=$items;
$_SESSION['total']=$total;

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Quality Water Suppliers</title>
<link rel="shortcut icon" href="images/drop.png"/>
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- jQuery (necessary JavaScript plugins) -->

<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/model.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="QUALITY WATER,CHEAPER RATES, WATER PRODUCTS,WATER SUPPLIERS" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#myModal").modal('show');
  });
</script>


<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<link rel="stylesheet" href="css/etalage.css">

<script src="js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="js/menu_jquery.js"></script>
<script src="js/simpleCart.min.js"> </script>
</head>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 60%;
      height: 60%;
      margin: auto;
  }
  tr td table{
    border-color:#000;
   }
  </style>
<body>
<!-- header_top -->
<!-- header_top -->

<div class="top_bg">
	<div class="container">
		<div class="header_top">
			<div class="top_right">
				<ul>
					<li><a href="#">help</a></li>|
					<li><a href="contact.php">Contact</a></li>|
					<li><a href="developers.php">Developers</a></li>
				</ul>
			</div>
			<div class="top_left">
				<h2><span></span> Call us : +91 8381-097-399</h2>
			</div>
				<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- header -->
<div class="header_bg">
<div class="container">
	<div class="header">
	<div class="head-t">
		<div class="logo">
			<a href="index.php"><img src="images/logo.png" class="img-responsive" alt="LOGO HERE"/> </a>
		</div>

		<!-- start header_right -->
		<div class="header_right">
			<div class="rgt-bottom">

               
                 <?php
                    
                    if(($_SESSION['logged']=='1'))
                    {
                    	include_once("Config.php");  //connect to data base to take F_name and L_name

                $res = $pro->findOne(array('Customer.U_name' => $_SESSION['U_name']));

                  ?>
                    	<div class="log">
					    <div class="login" >
					    <?php 
					    		if($res['Customer']['U_name']=="admin")
					    			{?>
						<div id="loginContainer"><span><a href="admin.php" style="text-decoration: none;" ><?php echo "<p style='color:red'>Hi ".$res['Customer']['F_name']."</p>"; ?></a></span>
						<?php }
						else
									{
										?>
										<div id="loginContainer"><span><a href="Customer_Pro.php"><?php echo "<p style='color:red'>Hi ".$res['Customer']['F_name']."</p>"; ?></a></span>
										<?php
									}
						    ?>
						</div>
					</div>
				</div>

                  <?php
                    }
                 else
                 {
                 ?>
				<div class="log">
					<div class="login" >
						<div id="loginContainer"><a href="#" id="loginButton"><span>Login</span></a>
						    <div id="loginBox">                
						        <form id="loginForm" method="post" action="LoginCheck.php">
						                    <fieldset id="body">
						                	<fieldset>
						                          <label for="email">User Name</label>
						                          <input type="text" name="U_name" id="email">
						                    </fieldset>
						                    <fieldset>
						                            <label for="password">Password</label>
						                            <input type="password" name="password" id="password">
						                     </fieldset>
						                    <input type="submit" id="login" value="Sign in">
						                	<label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
						            	</fieldset>
						            <span><a href="sms_password.php">Forgot your password?</a></span>
								</form>
							</div>
						</div>
					</div>
				</div>
                 <?php } ?>


                <?php
				if(($_SESSION['logged']!='1'))
			{
				?><div class="reg">
					<a href="register.php">REGISTER</a>
				</div><?php
		}
			?>

				<?php
  					      include_once("Config.php");

  					?>
			<div class="cart box_1">
				<a href="checkout.php">
					<h3> ₹<?php echo $total;?> (<?php echo $items ;?> items)<img src="images/bag.png" alt=""></h3>
				</a>	
				<p><a href="emptycart.php" class="simpleCart_empty">(empty cart)</a></p>
				<div class="clearfix"> </div>
			</div>
			<div class="create_btn">
				<a href="checkout.php">CHECKOUT</a>
			</div>
			<?php
				if(($_SESSION['logged']=='1'))
			{
				?><div class="create_btn">
				<a href="logout.php">LOGOUT</a>
			</div><?php
		}
			?>
			<div class="clearfix"> </div>
		</div>
		
		<div class="clearfix"> </div>
		</div>
		<div class="clearfix"> </div>
	</div>
		<!-- start header menu -->
		<ul class="megamenu skyblue">
			<li class="active grid"><a class="color1" href="index.php">Home</a></li>
			
						
			<li><a class="color4" href="#">DISTILLED WATER PRODUCTS</a>
				<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<h4><a href="jarcan.php">Jars and cans</a></h4>
								<ul >
									<li>

										<form id="jar1"action="product.php" method="GET">
  										<input type="hidden" name="prod" value="kitch" /> <a style="cursor: pointer;" onclick="document.getElementById('jar1').submit()" >Kitchenware jar</a></li></form>
  									<li>
										<form id="jar2"action="product.php" method="GET">
  										<input type="hidden" name="prod" value="20c" /> <a style="cursor: pointer;" onclick="document.getElementById('jar2').submit()" >20L Water Can</a></li></form>
  									<li>
										<form id="jar3"action="product.php" method="GET">
  										<input type="hidden" name="prod" value="2c" /> <a style="cursor: pointer;" onclick="document.getElementById('jar3').submit()" >2L Water Can</a></li></form>
  									<li>

										<form id="jar4"action="product.php" method="GET">
  										<input type="hidden" name="prod" value="tc" /> <a style="cursor: pointer;" onclick="document.getElementById('jar4').submit()" >Water Can With Tap</a></li></form>
  									<li>
										<form id="jar5"action="product.php" method="GET">
  										<input type="hidden" name="prod" value="25c" /> <a style="cursor: pointer;" onclick="document.getElementById('jar5').submit()" >25L Jar</a></li></form>	
								</ul>
							</div>							
						</div>
						
						<div class="col1">
							<div class="h_nav">
								<h4><a href="bottles.php">Bottles</a></h4>
								<ul>
								
  									<li>
										<form id="b1"action="product.php" method="GET">
  										<input type="hidden" name="prod" value="500b" /> <a style="cursor: pointer;" onclick="document.getElementById('b1').submit()" >500ML Bottle</a></form></li>
  									<li>
										<form id="b2"action="product.php" method="GET">
  										<input type="hidden" name="prod" value="1b" /> <a style="cursor: pointer;" onclick="document.getElementById('b2').submit()" >1L Bottle</a></form></li>
  									<li>

										<form id="b3"action="product.php" method="GET">
  										<input type="hidden" name="prod" value="2b" /> <a style="cursor: pointer;" onclick="document.getElementById('b3').submit()" >2L Bottle</a></form></li>
  									<li>
										<form id="b4"action="product.php" method="GET">
  										<input type="hidden" name="prod" value="5b" /> <a style="cursor: pointer;" onclick="document.getElementById('b4').submit()" >5L Bottle</a></form></li>
  									<li>

										<form id="b5"action="product.php" method="GET">
  										<input type="hidden" name="prod" value="25b" /> <a style="cursor: pointer;" onclick="document.getElementById('b5').submit()" >25L Bottle</a></form></li>	

								</ul>	
							</div>												
						</div>
						<div class="col1">
							<div class="h_nav">
							<h4><a href="pouch.php">Water Pouches</a></h4>
								<ul>
									  <li>

										<form id="p"action="product.php" method="get">
  										<input type="hidden" name="prod" value="p1" /> <a style="cursor: pointer;" onclick="document.getElementById('p').submit()" >Water pouch</a></form></li>

								</ul>	
							</div>						
						</div>
						<div class="col1">
							<div class="h_nav">
								<h4>account</h4>
								<ul>
									<li><a href="register.php">login</a></li>
									<li><a href="register.php">create an account</a></li>
									<li><a href="checkout.php">my shopping bag</a></li>
									<li><a href="Customer_Pro.php">profile</a></li>
								</ul>	
							</div>						
						</div>
						
					<div class="row">
						<div class="col2"></div>
						<div class="col1"></div>
						<div class="col1"></div>
					</div>
    				</div>
				</li>				
				<li><a class="color5" href="#">NON-DISTILLED WATER PRODUCTS</a>
				<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<h4><a href="tanker.php">WATER TANKERS</a></h4>
								<ul>
									<li>

										<form id="t1"action="product.php" method="GET">
  										<input type="hidden" name="prod" value="2500l" /> <a style="cursor: pointer;" onclick="document.getElementById('t1').submit()" >2500L</a></form></li>

  										<li>
										<form id="t2"action="product.php" method="GET">
  										<input type="hidden" name="prod" value="5000l" /> <a style="cursor: pointer;" onclick="document.getElementById('t2').submit()" >5000L</a></form></li>

  										<li>
										<form id="t3"action="product.php" method="GET">
  										<input type="hidden" name="prod" value="10000l" /> <a style="cursor: pointer;" onclick="document.getElementById('t3').submit()" >10000L</a></form></li>
								</ul>	
							</div>							
						</div>
							
						<div class="col1">
							<div class="h_nav">
								<h4>account</h4>
								<ul>
									<li><a href="register.php">login</a></li>
									<li><a href="register.php">create an account</a></li>
									<li><a href="checkout.php">my shopping bag</a></li>
									<li><a href="Customer_Pro.php">profile</a></li>
								</ul>	
							</div>						
						</div>
						
					
					<div class="row">
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
					</div>
    				</div>
				</li>
				
			
				<li><a class="color7" href="#">WATER PURIFIERS</a>
				<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<h4><a href="purifiers.php">Water Purifiers</a></h4>
								<ul>
									<li>
										<form id="P1"action="product.php" method="GET">
  										<input type="hidden" name="prod" value="20p" /> <a style="cursor: pointer;" onclick="document.getElementById('P1').submit()" >20L</a></form></li>
  									<li>
										<form id="P2"action="product.php" method="GET">
  										<input type="hidden" name="prod" value="35p" /> <a style="cursor: pointer;" onclick="document.getElementById('P2').submit()" >35L</a></form></li>
  									<li>
										<form id="P3"action="product.php" method="GET">
  										<input type="hidden" name="prod" value="50p" /> <a style="cursor: pointer;" onclick="document.getElementById('P3').submit()" >50L</a></form></li>
								</ul>	
							</div>							
						</div>
						
						<div class="col1">
							<div class="h_nav">
								<h4>account</h4>
								<ul>
									<li><a href="register.php">login</a></li>
									<li><a href="register.php">create an account</a></li>
									<li><a href="checkout.php">my shopping bag</a></li>
									<li><a href="Customer_Pro.php">profile</a></li>
								</ul>	
							</div>						
						</div>
						
					</div>
					<div class="row">
						<div class="col2"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
					</div>
    				</div>
				</li>				
			
				<li><a class="color8" href="#">WATER DISTILLER</a>
				<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								<h4><a href="distiller.php">Water Distiller</a></h4>
								<ul>
  									<li>
										<form id="d1"action="product.php" method="GET">
  										<input type="hidden" name="prod" value="dist1" /> <a style="cursor: pointer;" onclick="document.getElementById('d1').submit()" >Steel Water Distiller</a></form></li>
  									<li>
										<form id="d2"action="product.php" method="GET">
  										<input type="hidden" name="prod" value="dist2" /> <a style="cursor: pointer;" onclick="document.getElementById('d2').submit()" >Imported Water Distiller</a></form></li>
								</ul>	
							</div>							
						</div>
						
						<div class="col1">
							<div class="h_nav">
								<h4>account</h4>
								<ul>
									<li><a href="register.php">login</a></li>
									<li><a href="register.php">create an account</a></li>
									<li><a href="checkout.php">my shopping bag</a></li>
									<li><a href="Customer_Pro.php">profile</a></li>
								</ul>	
							</div>						
						</div>
						
					</div>
					<div class="row">
						<div class="col2"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
						<div class="col1"></div>
					</div>
    				</div>
				</li>
	
		 </ul> 
	</div>
