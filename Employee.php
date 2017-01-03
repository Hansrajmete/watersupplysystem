<?php
   include_once("Config.php");
   //$c=$mc->createCollection("Customer");

                           $res1 = $pro->findOne(array('Employee.e_id' =>$_POST['e_id'])); //check for availability of user name


    if(!$res1)
    {
              $res=$pro->insert(array('Employee'=>array('e_id'=> $_POST['e_id'],'F_name' => $_POST['F_name'],'L_name' => $_POST['L_name'],'M_number' => $_POST['M_Number'],'email' => $_POST['email'],'address'=> $_POST['address'],'salary'=> $_POST['salary'],'designation'=> $_POST['designation'],'department'=> $_POST['department'])));

                 if($res):
                      echo "<script type='text/javascript'>alert('You are successfully registered | Login to Continue '); window.location.href='register_employee.php';</script>";  
        
               endif;

     }
     else{
      echo "<script type='text/javascript'>alert('Given User Name is Not Available ..Enter Unique Emp_ID'); window.location.href='all_employees.php';</script>";
                  
      } 

?>