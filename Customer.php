<?php
   include_once("Config.php");
   //$c=$mc->createCollection("Customer");

                           $res1 = $pro->findOne(array('Customer.U_name' =>$_POST['U_name'])); //check for availability of user name


    if(!$res1)
    {
              $res=$pro->insert(array('Customer'=>array('F_name' => $_POST['F_name'],'L_name' => $_POST['L_name'],'M_number' => $_POST['M_Number'],'email' => $_POST['email'],'address'=> $_POST['address'],'U_name'=>$_POST['U_name'],'password' => $_POST['password'],'P_amt' => '00.00')));

                 if($res):
                      echo "<script type='text/javascript'>alert('You are successfully registered | Login to Continue '); window.location.href='register.php';</script>";  
        
               endif;

     }
     else{
     	echo "<script type='text/javascript'>alert('Given User Name is Not Available ..Enter Unique User Name'); window.location.href='register.php';</script>";
      	          
      } 

?>