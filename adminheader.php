<?php
    session_start();
    error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Water Corporation Admin</title>

<link rel="shortcut icon" href="images/drop.png"/>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.css" rel="stylesheet" />
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

<style >
	hr { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 4px;
} 

</style>

</head>
<body>

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


<div class="header_bg">
<div class="container">
	<div class="header">
	<div class="head-t">
		<div class="logo">
			<a href="index.php"><img src="images/logo.png" class="img-responsive" alt="LOGO HERE"/> </a>
		</div>


  <div class="header_right">
			<div class="rgt-bottom">
                 <?php
                    if(($_SESSION['logged']=='1'))
                    {
                    	include_once("Config.php");  //connect to data base to take F_name and L_name

                $res = $pro->findOne(array('Customer.U_name' => $_SESSION['U_name']));

                  ?>
                    	<div class="log">
					    
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
						            <span><a href="#">Forgot your password?</a></span>
								</form>
							</div>
						</div>
					</div>
				</div>
                 <?php 
                 } 
                ?>
			
			<?php
			include_once("Config.php");
				if(($_SESSION['logged']=='1'))
			{
				?><div class="create_btn">
				<a href="logout.php">LOGOUT</a>
			</div><?php
		}
			if($_SESSION['U_name']=="admin")
			{
			?>

			<h1><a href="admin.php" style="font-family: 'Tangerine', 'Playfair Display';
  font-size: 1.5em;">Admin</a></h1>
  <?php
		}
		?>
			<div class="clearfix"> </div>
		</div>
		
		<div class="clearfix"> </div>
		</div>
		<div class="clearfix"> </div>
	</div>


</div>
</div>
</div>
</div>
<hr>




</body>
</html>