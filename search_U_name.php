<?php
session_start();
include_once("Config.php");

$res = $pro->findOne(array('Customer.U_name' => $_POST['search']));

if($_POST['search']=='all')
{
	header("Location: all_customers.php");

}

if($res)
{
	
	$_SESSION['S_U_name']=$_POST['search'];
        

   header("Location: found_user.php");
	//echo "<script type='text/javascript'>alert('Hello You are successfully Loged_In '); window.location.href='Customer_Pro.php';</script>";
	//echo "<h2>Hiii..!! ".$_POST['U_name']."</font></h2>";
}
else
  {
  	
     echo "<script type='text/javascript'>alert('No Such Cusrtomer '); window.location.href='all_customers.php';</script>";
  }	

?>