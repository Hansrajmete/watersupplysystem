<?php
session_start();
include_once("Config.php");


			$res = $pro->findOne(array('Product.pro_id' => $_POST['pro_id']));

$_SESSION[$_POST['pro_id']]['0']=1;
$_SESSION[$_POST['pro_id']]['1']=$res['Product']['price'];
$_SESSION[$_POST['pro_id']]['2']=1;

  
			echo "<script type='text/javascript'>alert('Added to cart '); history.back();</script>";
			

    ?>