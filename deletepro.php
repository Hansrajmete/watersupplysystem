<?php

include ("adminheader.php");
include_once("Config.php");


   
         if($_GET['from']=='profile')
         {
            echo "<script type='text/javascript'>alert('Forbidden'); window.location.href='index.php';</script>";

         }
         else if($_GET['from']=='admin')
         {
            
         $data = $pro->remove(array('Product.pro_id' =>  $_GET['pro_id']));
         echo "<script type='text/javascript'>alert('Product deleted '); window.location.href='all_products.php';</script>";
     }
 


?>
