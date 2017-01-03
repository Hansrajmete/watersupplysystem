<?php
session_start();
$name=$_POST['F_name'];
include 'header.php';
$otpn=rand(100000,999999);
$pass=$_POST['password'];
                           $res1 = $pro->findOne(array('Customer.U_name' =>$_POST['U_name'])); //check for availability of user name

if($res1){
     	echo "<script type='text/javascript'>alert('Given User Name is Not Available ..Enter Unique User Name'); window.location.href='register.php';</script>";
      	          
      } 
if($_SESSION['otp']==0)
{
	$_SESSION['otp']=$otpn;
	 include('func.php');
error_reporting(0);
set_time_limit(0);
$ser="http://site24.way2sms.com/";
$ckfile = tempnam ("/tmp", "CURLCOOKIE");
$login=$ser."Login1.action";
// * Reciving Username of Way2sms A/c from Html form //
$uid="7020073329";
// * Reciving Password of Way2sms A/c from Html form //
$pwd="Q2563H";
// * To whome the message send to //
$to=$_POST['M_Number'];
// * Message to be sended //
$msg="Welcome to Water Corp.Your OTP (One Time Password) for registration is ".$_SESSION['otp'];
if(!$to)
{ $to=$uid; }
if(!$msg)
{ $msg=rword(5).rword(5).rword(5).rword(5).rword(5); }
$captcha=input($_REQUEST['captcha']);
flush();
if($uid && $pwd)
{
$ibal="0";
$sbal="0";
$lhtml="0";
$shtml="0";
$khtml="0";
$qhtml="0";
$fhtml="0";
$te="0";
flush();

$loginpost="gval=&username=".$uid."&password=".$pwd."&Login=Login";

$ch = curl_init();
$lhtml=post($login,$loginpost,$ch,$ckfile);
////curl_close($ch);

if(stristr($lhtml,'Location: '.$ser.'vem.action') || stristr($lhtml,'Location: '.$ser.'MainView.action') || stristr($lhtml,'Location: '.$ser.'ebrdg.action'))
{
preg_match("/~(.*?);/i",$lhtml,$id);
$id=$id['1'];
if(!$id)
{
goto end;
}
// * Login Sucess Message//

goto bal;
}
elseif(stristr($lhtml,'Location: http://site2.way2sms.com/entry'))
{
goto end;
}
else
{
// * Login Faild or SMS Send Error Message 2//

goto end;
}
bal:
///$ch = curl_init();
$msg=urlencode($msg);
$main=$ser."smstoss.action";
$ref=$ser."sendSMS?Token=".$id;
$conf=$ser."smscofirm.action?SentMessage=".$msg."&Token=".$id."&status=0";

$post="ssaction=ss&Token=".$id."&mobile=".$to."&message=".$msg."&Send=Send Sms&msgLen=".strlen($msg);
$mhtml=post($main,$post,$ch,$ckfile,$proxy,$ref);

curl_close($ch);

end:

flush();
}
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
		
		})();
		</script>
		 <div class="registration_form">
		 <!-- Form -->
			<form id="registration_form" action="otp.php" method="POST">
				<div>
					<label>
						<input placeholder="first name:" name="F_name" type="text" tabindex="1" required autofocus value="<?php echo $name ?>" >
					</label>
				</div>
				<div>
					<label>
						<input placeholder="last name:" name="L_name" type="text" tabindex="2" required autofocus value="<?php echo $_POST['L_name']?>">
					</label>
				</div>
				<div>
					<label>
						<input placeholder="Mobile Number:" name="M_Number" type="tel" maxlength="10"  tabindex="3" required value="<?php echo $_POST['M_Number']?>">
					</label>
				</div>
				<div>
					<label>
						<input placeholder="email address:" name="email" type="email" tabindex="4" required value="<?php echo $_POST['email']?>">
					</label>
				</div>
				<div>
					<label>
						<input placeholder ="Address" name="address" rows="2" cols="55" tabindex="5" value="<?php echo $_POST['address']?>"></input>
					</label>

				</div>
				
             

                    <div id="frmCheckUsername">
                          <label>
                          <input placeholder="Choose Unique User_Name " name="U_name" type="text" tabindex="6" id="U_name" class="demoInputBox" onBlur="checkAvailability()" required value="<?php echo $_POST['U_name']?>"><span id="user-availability-status"></span> </label>   
                           </div>
                         


                      
                

                   

				<div>
					<label>
						<input placeholder="password" name="password" type="password" tabindex="7" required value="<?php echo $_POST['password']?>">
					</label>
				</div>						
				<div>
					<label>
						<input placeholder="retype password" name="re_password" type="password" tabindex="8" required value="<?php echo $_POST['re_password']?>">
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
					<a href="#">forgot your password</a>
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







<div class="modal fade" id="myModal" role="dialog">
  
    <div class="modal-dialog" position=absolute>
    
      <!-- Modal content-->
      <div class="modal-content">
      <div class="bg-1">
       
        <div class="modal-header">
          
          
          <center><h1 class="modal-title fHead">Mobile Number OTP Verification. </h1></center>
        </div>
        <div class="modal-body">
        

      <?php
              echo "Enter the One Time password (OTP) sent to your mobile number.";

              ?>
              <form method="post">
              <input type="number" name="inc" value="">
              <input type="submit" name="update" value="Submit">

              	<input name="password" type="password" hidden value="<?php echo $_POST['password']?>" />
              	<input name="F_name" type="text" hidden value="<?php echo $_POST['F_name']?>" />
              	<input name="L_name" type="text" hidden value="<?php echo $_POST['L_name']?>" />
				<input name="M_Number" type="tel" maxlength="10" hidden value="<?php echo $_POST['M_Number']?>" />
				<input name="email" type="email"  hidden value="<?php echo $_POST['email']?>" />
				<input name="address" hidden value="<?php echo $_POST['address']?>" />
				<input name="U_name" hidden type="text" id="U_name" value="<?php echo $_POST['U_name']?>" /> 
				<input type="submit" hidden value="Become Customer" id="register-submit" />
              </form>   
              <form method="post" id="otpsuccess" action="Customer.php">

              	<input name="password" type="password" hidden value="<?php echo $_POST['password']?>" />
              	<input name="F_name" type="text" hidden value="<?php echo $_POST['F_name']?>" />
              	<input name="L_name" type="text" hidden value="<?php echo $_POST['L_name']?>" />
				<input name="M_Number" type="tel" maxlength="10" hidden value="<?php echo $_POST['M_Number']?>" />
				<input name="email" type="email"  hidden value="<?php echo $_POST['email']?>" />
				<input name="address" hidden value="<?php echo $_POST['address']?>" />
				<input name="U_name" hidden type="text" id="U_name" value="<?php echo $_POST['U_name']?>" /> 
				<input type="submit" hidden value="Become Customer" id="register-submit" />

              </form>
            
              <?php
         if(isset($_POST["update"]))
              {
                //echo "Updatsdvds dfbz".$_POST['inc'];
                if($_POST["inc"]==$_SESSION['otp'])
                {
                	$_SESSION['otp']=0;
                	?> <script type='text/javascript'> document.getElementById("otpsuccess").submit();</script> <?php
                }

                else
                {
                	echo "Invalid.Enter Again.";
                }

 
           
             
               
               
               
              }     
      ?>
      
       </div>
        <div class="modal-footer">
           
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="window.location.href='register.php';">Close</button>
        </div>

        </div>

        </div>
        </div>
        </div>

</body>

</html>
