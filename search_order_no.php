<?php
error_reporting(0);
session_start();
include_once("Config.php");


$res = $pro->findOne(array('Order.order_no' => (int)$_POST['search']));

if($_POST['search']=='all')
{
	header("Location: total_order_history.php");

}
if($res && $res['Order']['by']=='customer')
{
	
	$_SESSION['order_no']=$_POST['search'];
        
   header("Location: found_customer_order_no.php");
  // echo $_POST['search'];
	//echo "<script type='text/javascript'>alert('Hello You are successfully Loged_In '); window.location.href='Customer_Pro.php';</script>";
	//echo "<h2>Hiii..!! ".$_POST['U_name']."</font></h2>";
}
else if($res && $res['Order']['by']=='admin')
{

	$_SESSION['order_no']=$_POST['search'];
        

   header("Location: found_admin_order_id.php");
}
else
  {
  	
     echo "<script type='text/javascript'>alert('No Such order '); window.location.href='total_order_history.php';</script>";
  }	

?>