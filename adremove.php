<?php
 include_once "Config.php";


 $cursor=$pro->find();

 foreach ($cursor as $key) {

               if($key['TempAdminBill'])
               {

                  $data = $pro->remove(array('TempAdminBill.pro_id' =>  $_GET['Rpro_id']));

                 if($data)
                     {
         	            echo "<script type='text/javascript'>alert('Item Removed From Bill '); window.location.href='bill.php';</script>";

                      }
         

               }

 	 }



?>