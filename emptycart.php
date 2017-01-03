<?php
session_start();


   include_once("Config.php");
$cursor=$pro->find();
foreach ($cursor as $temp) {
  if($temp['Product'])
  {
    
    $_SESSION[$temp['Product']['pro_id']]=array(0,$temp['Product']['price'],0);    //0=notadded,price,quantity
}
}


 echo "<script type='text/javascript'>alert('Cart Emptied '); history.back()</script>";

?>