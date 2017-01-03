<?php
include_once("Config.php");

$res = $pro->findOne(array('Customer.U_name' => $_POST['U_name'], 'Customer.password' =>$_POST['password']));

if($res)
{
	$_SESSION['logged']='1';
	$_SESSION['U_name']=$_POST['U_name'];
$cursor=$pro->find();


	echo "<script type='text/javascript'>alert('Hello You are successfully Loged_In ');</script>";
  if($_SESSION['U_name']=='admin')
    {

  echo "<script type='text/javascript'>window.location.href='admin.php';</script>";

    }
    else{
     echo "<script type='text/javascript'> window.location.href='index.php';</script>";

    }
	//echo "<h2>Hiii..!! ".$_POST['U_name']."</font></h2>";
}
else
  {
     echo "<script type='text/javascript'>alert('Invalid Credentials '); history.back();</script>";
  }	

?>