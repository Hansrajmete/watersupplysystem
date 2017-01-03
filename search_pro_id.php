<?php
session_start();
include_once("Config.php");

$res = $pro->findOne(array('Product.pro_id' => $_POST['search']));

if($_POST['search']=='all')
{
	header("Location: all_products.php");

}

if($res)
{
	
	$_SESSION['S_pro_id']=$_POST['search'];
        

   header("Location: found_pro_id.php");
	//echo "<script type='text/javascript'>alert('Hello You are successfully Loged_In '); window.location.href='Customer_Pro.php';</script>";
	//echo "<h2>Hiii..!! ".$_POST['U_name']."</font></h2>";
}
else
  {
  	
     echo "<script type='text/javascript'>alert('No Such Cusrtomer '); window.location.href='all_products.php';</script>";
  }	

?>