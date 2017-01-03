<?php
session_start();
include 'header.php';
$_SESSION['otp']=0;

if($_SESSION['logged']=='1')
{
echo "<script type='text/javascript'>alert('already Logged in user... ');window.location.href='index.php';</script>";
}
?>
<!-- content -->
<div class="container">
<div class="main">
	<!-- start registration -->
	<div class="registration">
		<div class="registration_left">
		<h2>new Customer? <span> create an account </span></h2>
		<!-- [if IE] 
		    < link rel='stylesheet' type='text/css' href='ie.css'/>  
		 [endif] -->  
		  
		<!-- [if lt IE 7]>  
		    < link rel='stylesheet' type='text/css' href='ie6.css'/>  
		<! [endif] -->  
		<script>
			(function() {
		
			// Create input element for testing
			var inputs = document.createElement('input');
			
			// Create the supports object
			var supports = {};
			
			supports.autofocus   = 'autofocus' in inputs;
			supports.required    = 'required' in inputs;
			supports.placeholder = 'placeholder' in inputs;
		
			// Fallback for autofocus attribute
			if(!supports.autofocus) {
				
			}
			
			// Fallback for required attribute
			if(!supports.required) {
				
			}
		
			// Fallback for placeholder attribute
			if(!supports.placeholder) {
				
			}
			
			// Change text inside send button on submit
			var send = document.getElementById('register-submit');
			if(send) {
				send.onclick = function () {
					this.innerHTML = '...Sending';
				}
			}
		
		});

			function validateform()
			{
				var x=document.forms ["registration_form"]["password"].value;
				var y=document.forms ["registration_form"]["re_password"].value;
				if(x!=y)
				{
					alert("PASSWORD MISMATCH");
					return false;
				}
			}
		</script>
		 <div class="registration_form">
		 <!-- Form -->
			<form id="registration_form" action="otp.php" onsubmit="return validateform();" method="POST" autocomplete="TRUE">
				<div>
					<label>
						<input placeholder="first name:" name="F_name" type="text" tabindex="1" required autofocus>
					</label>
				</div>
				<div>
					<label>
						<input placeholder="last name:" name="L_name" type="text" tabindex="2" required autofocus>
					</label>
				</div>
				<div>
					<label>
						<input placeholder="Mobile Number:" name="M_Number" type="tel" maxlength="10" minlength="10" tabindex="3" required>
					</label>
				</div>
				<div>
					<label>
						<input placeholder="email address:" name="email" type="email" tabindex="4" required>
					</label>
				</div>
				<div>
					<label>
						<textarea placeholder ="Address" name="address" rows="2" cols="47" tabindex="5"></textarea>
					</label>

				</div>
				
             

                    <div id="frmCheckUsername">
                          <label>
                          <input placeholder="Choose Unique User_Name " name="U_name" type="text" tabindex="6" id="U_name" class="demoInputBox" onBlur="checkAvailability()" required><span id="user-availability-status"></span> </label>   
                           </div>
                         


                      
                

                   

				<div>
					<label>
						<input placeholder="password" name="password" type="password" tabindex="7" required>
					</label>
				</div>						
				<div>
					<label>
						<input placeholder="retype password" name="re_password" type="password" tabindex="8" required>
					</label>
				</div>	
				<div>
					<input type="submit" value="Become Customer" id="register-submit">
				</div>

				<div class="sky-form">
					<label class="checkbox"><input type="checkbox" name="checkbox" checked><i></i>i agree to Water_Sys.com &nbsp;<a class="terms" href="#"> terms of service</a> </label>
				</div>
			</form>
			<!-- /Form -->
		</div>
	</div>
	<div class="registration_left">
		<h2>existing Customer</h2>
		 <div class="registration_form">
		 <!-- Form -->
			<form id="registration_form" action="LoginCheck.php" method="post">
			
				<div>
					<label>
						<input placeholder="User Name" name="U_name" type="text" tabindex="10" required>
					</label>
				</div>
				<div>
					<label>
						<input placeholder="password" name="password" type="password" tabindex="11" required>
					</label>
				</div>						
				<div>
					<input type="submit" value="sign in" id="register-submit">
				</div>
				<div class="forget">
					<a href="sms_password.php">forgot your password</a>
				</div>
			</form>
			<!-- /Form -->
			</div>
	</div>
	<div class="clearfix"></div>
	</div>
	<!-- end registration -->
</div>
</div>
<?php
include 'footer.php'
?>

<script type="text/javascript">
function checkAvailability() {
//$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'U_name='+$("#U_name").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
//$("#U_name").val("");
//$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
</body>

</html>
