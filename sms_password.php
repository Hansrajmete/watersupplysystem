<?php
error_reporting(0);
session_start();
include_once("Config.php");

?>

<!DOCTYPE html>
<html>
<head>
<title>Password Reminder Portal </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/normalize2.css">

    
        <link rel="stylesheet" href="css/style2.css">

</head>
<body>

 <section class="login-form-wrap">
  <h1>Password Remainder Portal</h1>
  <form class="login-form" method="POST" action="sms_password_modal.php">
    <label>
      <input type="text" name="username" required placeholder="Username OR Email">
    </label>
    <input type="submit" value="Submit Credentials">
  </form>
</section>
    
 

    
  </body>
</html>




