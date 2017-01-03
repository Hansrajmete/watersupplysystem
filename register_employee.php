<?php
include 'header.php'
?>
<!-- content -->
<div class="container">
<div class="main">
	<!-- start registration -->
	<div class="registration">
		<div class="registration_left">
		<h2>new Employee? <span> create an account </span></h2>
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
		
		})();
		</script>
		 <div class="registration_form">
		 <!-- Form -->
			<form id="registration_form" action="Employee.php" method="post">
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
						<input placeholder="Mobile Number:" name="M_Number" type="tel" maxlength="10"  tabindex="3" required>
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
				
				<div>
					<label>
						<input placeholder="salary:" name="salary" type="tel" tabindex="4" required>
					</label>
				</div>
				<div>
					<label>
						<input placeholder="designation:" name="designation" type="text" tabindex="4" required>
					</label>
				</div>
								<div>
					<label>
						<input placeholder="department:" name="department" type="text" tabindex="4" required>
					</label>
				</div>
             

                    <div id="frmCheckEmpid">
                          <label>
                          <input placeholder="Choose Unique Emp_ID " name="e_id" type="text" tabindex="6" id="e_id" class="demoInputBox" onBlur="checkAvailability()" required><span id="emp-availability-status"></span> </label>   
                     </div>
                         <!--p><img src="LoaderIcon.gif" id="loaderIcon" style="display:none" /></p-->


                      
                <?php

               /*      $temp='0';
                     
                     while($temp=='0')
                     {
                ?>

                 <div>
					<label>
						<input placeholder="Choose User Name :" name="U_name" type="text" tabindex="6" required >
					</label>
				 </div>

                <?php
                        include_once("Config.php");  //connect to data base to take F_name and L_name

                     $res = $mc->findOne(array('Customer.U_name' => 'U_name'));

                         if(!$res)
                          {
                           $temp='1';
                          }

                      }
                      */

                ?>
				<div>
					<input type="submit" value="Become Employee" id="register-submit">
				</div>

				<div class="sky-form">
					<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>i agree to Water_Sys.com &nbsp;<a class="terms" href="#"> terms of service</a> </label>
				</div>
			</form>
			<!-- /Form -->
		</div>
	</div>


	<!-- end registration -->
</div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php
include 'footer.php'
?>

<script type="text/javascript">
function check
//$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability_e_id.php",
data:'e_id='+$("#e_id").val(),
type: "POST",
success:function(data){
$("#emp-availability-status").html(data);
//$("#U_name").val("");
//$("#loaderIcon").hide();
},
error:function (){}
});

}
</script>
</body>

</html>
