<?php

include ("adminheader.php");
include_once("Config.php");


 	
         $data = $pro->remove(array('Employee.e_id' =>  $_GET['e_id']));
         if($_GET['from']=='profile')
         {
         	echo "<script type='text/javascript'>alert('Customer account deleted '); window.location.href='index.php';</script>";

         }
         else if($_GET['from']=='admin')
         {
         	
         echo "<script type='text/javascript'>alert('Customer account deleted '); window.location.href='all_customers.php';</script>";
     }
 


?>
