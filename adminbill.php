<?php
include_once ("Config.php");
session_start();

date_default_timezone_set("Asia/Kolkata");

$cursor=$pro->find();
$total=0;
$i=0;
$p_array=array();
foreach($cursor as $key)
{
  if($key['TempAdminBill'])
  {
	$p_array[$i]=$key['TempAdminBill'];
	$i++;
	$total=$total+$key['TempAdminBill']['price']*$key['TempAdminBill']['quantity'];
}
}

//$res1 = $mp->findOne(array('Product.pro_name' =>$_POST['selected_products']));
$oid= $pro->count(array('Order.by'=>'admin')) + $pro->count(array('Order.by'=>'customer'))+ 76345937456;// + 121311+$pro->count({'AdminBill'});

$res=$pro->insert(array('Order'=>array('order_no'=> $oid,'by'=>'admin','customer' => $_SESSION['customer_type'],'customer_type' => $_SESSION['Customer_Type'],'date' => date("d/m/Y"), 'products' => $p_array,'total_bill' => $total,'p_type'=>'Cash','status'=>'paid','d_addr'=>'Adminshop')));


                 if($res){
                        
                      
                       $cursor2=$pro->find();
                       
                        foreach ($cursor2 as $key) {

                             if($key['TempAdminBill'])
                             {


                        	$pro_ava=$pro->findOne(array('Product.pro_name'=> $key['TempAdminBill']['pro_name']));
                             
                             $up_ava=$pro_ava['Product']['available'] - $key['TempAdminBill']['quantity'];

                             $pro->update(array('Product.pro_name' => $key['TempAdminBill']['pro_name']),array('$set'=>array('Product.available' => $up_ava)));
                             

                        	# code...
                           }
                        }

                        foreach ($cursor2 as $key ) {

                                  if($key['TempAdminBill'])
                                  {
                                    $pro->remove(array('_id'=>new MongoId($key['_id'])));
                                    //$key['TempAdminBill'].drop();
                                  }
                          
                        }
                       
                     //$mtab->drop();

                      echo "<script type='text/javascript'>alert('Bill added to Order track collection '); window.location.href='admin.php';</script>";  
                
        
               }
               else
               {
               	echo "NOp";
               }
  // }
               ?>