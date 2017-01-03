<?php
session_start();
include_once("Config.php");

$res = $pro->findOne(array('Employee.e_id' => $_POST['search']));

if($_POST['search']=='all')
{
	header("Location: all_employees.php");

}

if($res)
{
	
	$_SESSION['e_id']=$_POST['search'];
        

   header("Location: found_e_id.php");
	//echo "<script type='text/javascript'>alert('Hello You are successfully Loged_In '); window.location.href='Customer_Pro.php';</script>";
	//echo "<h2>Hiii..!! ".$_POST['U_name']."</font></h2>";
}
else
  {
  	
     echo "<script type='text/javascript'>alert('No Such Employee '); window.location.href='all_employees.php';</script>";
  }	

?>