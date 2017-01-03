<?php
  session_start();
  
  if($_POST['User_Type']=='Daily')
  {
  	if(!empty($_POST['user_type'])) {
                     include_once("Config.php");  //connect to data base to take F_name and L_name

                     $res = $pro->findOne(array('Customer.U_name' =>$_POST['user_type']));
                     if($res)
                     {
                     	
                     	 $_SESSION['customer_type']=$_POST['user_type'];
                     	 $_SESSION['Customer_Type']=$_POST['User_Type'];
                     	header("location:select_pro.php");
                          
                     }
                     else
                     {
                     	 echo "<script type='text/javascript'>alert('No Such a Customer user name in registered customer');window.location.href='take_order.php';</script>";
                     	 

                     }
                    }
     }

     if($_POST['User_Type']=='General')
     {
     	$_SESSION['customer_type']=$_POST['user_type'];
     	$_SESSION['Customer_Type']=$_POST['User_Type'];
                     	header("location:select_pro.php");

     }



  

?>