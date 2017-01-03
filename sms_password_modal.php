<?php


session_start();
error_reporting(0);

include_once("Config.php");

date_default_timezone_set("Asia/Kolkata");

$res = $pro->findOne(array("Customer.U_name" => $_POST['username']));
if(!$res)
{
$res = $pro->findOne(array("Customer.email" => $_POST['username']));
}
$password = $res['Customer']['password'];
if(!$res)
{
  echo "<script type='text/javascript'>alert('No Such User Found'); window.location.href='sms_password.php';</script>";
}
else 
{
?>

<?php
include('func.php');
error_reporting(0);
set_time_limit(0);
$ser="http://site24.way2sms.com/";
$ckfile = tempnam ("/tmp", "CURLCOOKIE");
$login=$ser."Login1.action";
// * Reciving Username of Way2sms A/c from Html form //
$uid="7875451222";
// * Reciving Password of Way2sms A/c from Html form //
$pwd="R6324N";
// * To whome the message send to //
$to=$res['Customer']['M_number'];
// * Message to be sended //
$msg="hello ".$res['Customer']['F_name'].".Your password is ".$res['Customer']['password'].".";
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
?> 



<!DOCTYPE html>
<html>
<head>
<title>Password Finder Portal </title>
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
    <h1>Sent </h1>
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
                  <h2>Password Sent Successfully!!!</h2>
                  <input type="button" value="Back to Homepage" onclick="location.href='index.php'">
                </div>

                  
              </div>
            </div>  

    </div>
    
  </div>
</body>
</html>


<?php
}
?>








