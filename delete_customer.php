<?php

include ("adminheader.php");
include_once("Config.php");

$res = $pro->findOne(array('Customer.U_name' => $_GET['username']));
//echo $res['Customer']['P_amt'];
 if($res['Customer']['P_amt']<='0')
 {
 	
         $data = $pro->remove(array('Customer.U_name' =>  $_GET['username']));
         if($_GET['from']=='profile')
         {
         	echo "<script type='text/javascript'>alert('Customer account deleted '); window.location.href='index.php';</script>";

         }
         else if($_GET['from']=='admin')
         {
         	
         echo "<script type='text/javascript'>alert('Customer account deleted '); window.location.href='all_customers.php';</script>";
     }
 }

else
	{
		?>
		<div class="container">
  <div class="main">
  <center>
  <h1 style="color:red">Customer Have Pending Amount: <?php echo $res['Customer']['P_amt']; ?></h1>
  </center>
</div>
   <?php
      if($_GET['from']=='profile')
      {
      	echo "<script type='text/javascript'>alert('Customer can not be removed | as Customer have Pending amount '); window.location.href='Customer_Pro.php';</script>";

      }
      else if($_GET['from']=='admin')
      {

		echo "<script type='text/javascript'>alert('Customer can not be remove | as Customer have Pending amount '); window.location.href='all_customers.php';</script>";
	}

	}

?>

?>
